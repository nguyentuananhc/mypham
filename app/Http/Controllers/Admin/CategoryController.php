<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use App\Category;
use App\CategoryTranslation;
use App\Services\CategoryService;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    protected $service;
    protected $indexRoute = 'admin.categories.index';

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with(['translations'])->orderBy('id', 'DESC')->get();
        $languages = Language::all();

        return view($this->indexRoute, compact('categories', 'languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $langCode
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($langCode, $id = null)
    {
        $exceptLang = [];
        $category = Category::find($id);
        if ($category) {
            $exceptLang = CategoryTranslation::where('category_id', $id)->get()->pluck('lang_code')->toArray();
            $category->translation = $category->translation($langCode);
        }
        $languages = Language::whereNotIn('code', $exceptLang)->get();

        return view('admin.categories.create', compact('languages', 'langCode', 'id', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @param $langCode
     * @param null $id
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, $langCode, $id = null)
    {
        $rule = [];
        if (!$id) {
            $itemLang = CategoryTranslation::where('category_id', $id)->pluck('lang_code')->toArray();
            $availableLang = Language::whereNotIn('code', $itemLang)->pluck('code')->toArray();
            $rule['lang_code'] = ['required', Rule::in($availableLang)];
        }
        $this->validate($request, $rule);
        $this->service->store($request, $id);

        return redirect()->route($this->indexRoute);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $langCode
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($langCode, $id)
    {
        $categoryLang = CategoryTranslation::where('category_id', $id)->pluck('lang_code')->toArray();
        $languages = Language::whereNotIn('code', $categoryLang)->orWhere('code', $langCode)->get();
        $category = Category::findOrFail($id);
        $category->translation = $category->translation($langCode);

        return view('admin.categories.edit', compact('languages', 'id', 'langCode', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param $langCode
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, $langCode, $id)
    {
        $categoryLang = CategoryTranslation::where('category_id', $id)->pluck('lang_code')->toArray();
        $availableLang = Language::whereNotIn('code', $categoryLang)->orWhere('code', $langCode)->pluck('code')->toArray();
        $this->validate($request, [
            'lang_code' => ['required', Rule::in($availableLang)],
        ]);
        $this->service->update($request, $id);

        return redirect()->route($this->indexRoute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->destroy($id);

        return redirect()->back();
    }

    public function bulkDestroy(Request $request)
    {
        $this->service->bulkDestroy($request);

        return redirect()->back();
    }
}
