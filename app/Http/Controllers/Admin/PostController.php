<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PostRequest;
use App\Language;
use App\Post;
use App\PostTranslation;
use App\Services\PostService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    protected $service;

    public function __construct(PostService $postService)
    {
        $this->service = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['translations', 'user'])->orderBy('id', 'DESC')->get();
        $languages = Language::all();
        return view('admin.posts.index', compact('posts', 'languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $langCode
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function create($langCode, $id = null)
    {
        $exceptLang = [];
        $post = Post::find($id);
        if ($post) {
            $exceptLang = PostTranslation::where('post_id', $id)->get()->pluck('lang_code')->toArray();
            $post->translation = $post->translation($langCode);
        }
        $languages = Language::whereNotIn('code', $exceptLang)->get();

        return view('admin.posts.create', compact('languages', 'langCode', 'id', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @param $langCode
     * @param null $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request, $langCode, $id = null)
    {
        $productLang = PostTranslation::where('post_id', $id)->pluck('lang_code')->toArray();
        $availableLang = Language::whereNotIn('code', $productLang)->orWhere('code', $langCode)->pluck('code')->toArray();
        $this->validate($request, [
            'lang_code' => ['required', Rule::in($availableLang)],
        ]);
        $this->service->store($request, $id);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($langCode, $id)
    {
        $postLang = PostTranslation::where('post_id', $id)->pluck('lang_code')->toArray();
        $languages = Language::whereNotIn('code', $postLang)->orWhere('code', $langCode)->get();
        $post = Post::findOrFail($id);
        $post->translation = $post->translation($langCode);

        return view('admin.posts.edit', compact('languages', 'id', 'langCode', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $langCode, $id)
    {
        $postLang = PostTranslation::where('post_id', $id)->pluck('lang_code')->toArray();
        $availableLang = Language::whereNotIn('code', $postLang)->orWhere('code', $langCode)->pluck('code')->toArray();
        $this->validate($request, [
            'lang_code' => ['required', Rule::in($availableLang)],
        ]);
        $this->service->update($request, $id);

        return redirect()->route('admin.posts.index');
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
