<?php

namespace App\Services;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostService
{
    public function store(Request $request, $id)
    {

        $post = Post::firstOrCreate([
            'id' => $id,
        ], [
            'status' => $request->get('status'),
            'user_id' => $request->user()->id,
        ]);

        if ($request->hasFile('cover_image')) {
            $post->cover_image = $this->handleUploadImage($request);
            $post->save();
        }

        $post->translations()
            ->create($request->only(['title', 'description', 'content', 'lang_code']));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $this->handleUploadImage($request);
        }
        $post->status = $request->get('status');
        $post->save();

        $post->translations()->where('lang_code', $request->get('lang_code'))
            ->update($request->only(['title', 'description', 'content', 'lang_code']));
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->translations()->delete();
        Storage::delete($post->cover_image);
        $post->delete();
    }

    public function bulkDestroy(Request $request)
    {
        $ids = explode(',', $request->get('ids'));
        foreach ($ids as $id) {
            $this->destroy($id);
        }
    }

    private function handleUploadImage(Request $request)
    {
        $folder = 'posts/' . Carbon::now()->format('FY');
        $imageConfig = config('image.posts');
        $image = $request->file('cover_image');
        $img = Image::make($image)->fit($imageConfig['width'], $imageConfig['height']);
        $name = $folder . '/' . rand() . '_' . $image->getClientOriginalName();
        Storage::put($name, $img->stream()->__toString(), 'public');

        return $name;
    }
}