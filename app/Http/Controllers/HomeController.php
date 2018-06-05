<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    const NUM_CATEGORIES = 4;

    public function index()
    {
        $this->data['categories'] = Category::with(['products', 'translations' => function ($q) {
            $q->where('lang_code', app()->getLocale());
        }])

            ->take(self::NUM_CATEGORIES)->get();
        return $this->renderView('home.index');
    }
}
