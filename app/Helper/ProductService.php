<?php

namespace App\Helper;


use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductService
{
    public function store(Request $request, $id)
    {

        $product = Product::firstOrCreate([
            'id' => $id,
        ], [
            'is_available' => $request->get('is_available') === 'on' ? 1 : 0,
            'user_id' => $request->user()->id,
            'sale' => $request->get('sale'),
        ]);

        if ($request->hasFile('product_images')) {
            $product->images = $this->handleUploadImage($request);
            $product->save();
        }

        $product->translations()
            ->create($request->only(['name', 'price', 'name', 'description', 'content', 'lang_code']));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($request->hasFile('product_images')) {
            $product->images = $this->handleUploadImage($request);
        }
        $product->sale = $request->get('sale');
        $product->is_available = $request->get('is_available') == 'on' ? 1 : 0;
        $product->save();

        $product->translations()->where('lang_code', $request->get('lang_code'))
            ->update($request->only(['name', 'price', 'name', 'description', 'content']));
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->translations()->delete();
        Storage::delete($product->images);
        $product->delete();
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
        $folder = 'products/' . Carbon::now()->format('FY');
        $images = [];
        foreach ($request->file('product_images') as $image) {
            $imageConfig = config('image.products');
            $img = Image::make($image)->fit($imageConfig['width'], $imageConfig['height']);
            $name = $folder . '/' . rand() . '_' . $image->getClientOriginalName();
            Storage::put($name, $img->stream()->__toString(), 'public');
            $images[] = $name;
        }

        return $images;
    }
}