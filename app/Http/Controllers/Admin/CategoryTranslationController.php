<?php

namespace App\Http\Controllers\Admin;

use App\CategoryTranslation;
use App\Http\Controllers\Controller;

class CategoryTranslationController extends Controller
{
    public function destroy($id)
    {
        $productTranslation = CategoryTranslation::findOrFail($id);
        $productTranslation->delete();

        return redirect()->route('admin.categories.index');
    }
}
