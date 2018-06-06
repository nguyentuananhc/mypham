<?php

namespace App\Http\Controllers;

use App\Product;

class HomeController extends Controller
{
    const NUM_PRODUCT = 10;

    public function index()
    {
        $products = Product::with(['translations' => function ($q) {
            $q->where('lang_code', app()->getLocale());
        }])
            ->take(self::NUM_PRODUCT)->get();
        $this->data['products'] = $products;

        return $this->renderView('home.index');
    }
}
