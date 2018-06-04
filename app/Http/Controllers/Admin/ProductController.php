<?php

namespace App\Http\Controllers\Admin;

use App\Services\ProductService;
use App\Http\Requests\Admin\ProductRequest;
use App\Language;
use App\Product;
use App\ProductTranslation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
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
        $products = Product::with(['translations', 'user'])->orderBy('id', 'DESC')->get();
        $languages = Language::all();

        return view('admin.products.index', compact('products', 'languages'));
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
        $product = Product::find($id);
        if ($product) {
            $exceptLang = ProductTranslation::where('product_id', $id)->get()->pluck('lang_code')->toArray();
            $product->translation = $product->translation($langCode);
        }
        $languages = Language::whereNotIn('code', $exceptLang)->get();

        return view('admin.products.create', compact('languages', 'langCode', 'id', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @param $langCode
     * @param null $id
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, $langCode, $id = null)
    {
        $rule = [];
        if (!$id) {
            $productLang = ProductTranslation::where('product_id', $id)->pluck('lang_code')->toArray();
            $availableLang = Language::whereNotIn('code', $productLang)->pluck('code')->toArray();

            $rule['product_images'] = 'required';
            $rule['lang_code'] = ['required', Rule::in($availableLang)];

        }
        $this->validate($request, $rule);
        $this->service->store($request, $id);

        return redirect()->route('admin.products.index');
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
        $productLang = ProductTranslation::where('product_id', $id)->pluck('lang_code')->toArray();
        $languages = Language::whereNotIn('code', $productLang)->orWhere('code', $langCode)->get();
        $product = Product::findOrFail($id);
        $product->translation = $product->translation($langCode);

        return view('admin.products.edit', compact('languages', 'id', 'langCode', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param $langCode
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductRequest $request, $langCode, $id)
    {
        $productLang = ProductTranslation::where('product_id', $id)->pluck('lang_code')->toArray();
        $availableLang = Language::whereNotIn('code', $productLang)->orWhere('code', $langCode)->pluck('code')->toArray();
        $this->validate($request, [
            'lang_code' => ['required', Rule::in($availableLang)],
        ]);
        $this->service->update($request, $id);

        return redirect()->route('admin.products.index');
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
