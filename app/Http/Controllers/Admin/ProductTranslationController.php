<?php

namespace App\Http\Controllers\Admin;

use App\ProductTranslation;
use App\Http\Controllers\Controller;

class ProductTranslationController extends Controller
{
    public function destroy($id)
    {
        $productTranslation = ProductTranslation::findOrFail($id);
        $productTranslation->delete();

        return redirect()->route('admin.products.index');
    }
}
