<?php

namespace App\Http\Controllers\Admin;

use App\PostTranslation;
use App\Http\Controllers\Controller;

class PostTranslationController extends Controller
{
    public function destroy($id)
    {
        $postTranslation = PostTranslation::findOrFail($id);
        $postTranslation->delete();

        return redirect()->route('admin.posts.index');
    }
}
