<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $guarded = ['id'];
    protected $appends = ['cover_image', 'trans'];

    protected $casts = [
        'images' => 'array',
        'is_available' => 'boolean',
    ];

    public function translations()
    {
        return $this->hasMany(ProductTranslation::class)->with(['lang']);
    }

    public function translation($langCode)
    {
        return $this->translations()->where('lang_code', $langCode)->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCoverImageAttribute()
    {
        return cloud_link($this->images[0]);
    }

    public function getTransAttribute()
    {
        return $this->translations[0];
    }
}
