<?php

namespace App\Services;

use App\Category;
use Illuminate\Http\Request;

class CategoryService
{
    public function store(Request $request, $id)
    {

        $category = Category::firstOrCreate([
            'id' => $id,
        ]);

        $category->translations()
            ->create($request->only(['name', 'lang_code']));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->translations()->where('lang_code', $request->get('lang_code'))
            ->update($request->only(['name', 'lang_code']));
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->translations()->delete();
        $category->delete();
    }

    public function bulkDestroy(Request $request)
    {
        $ids = explode(',', $request->get('ids'));
        foreach ($ids as $id) {
            $this->destroy($id);
        }
    }
}