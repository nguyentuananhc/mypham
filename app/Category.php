<?php

namespace App;

use App\Traits\TranslationRelationshipTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use TranslationRelationshipTrait;

    const TYPE_PRODUCT = 1;
    const TYPE_POST = 2;
    const MAX_PRODUCT_TAKE = 10;

    protected $guarded = ['id'];

    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class)->with('lang');
    }

    public function products()
    {
        return $this->hasMany(Product::class)
            ->with(['translations'])
            ->take(self::MAX_PRODUCT_TAKE);
    }
}
