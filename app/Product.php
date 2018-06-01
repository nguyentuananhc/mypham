<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public $additional_attributes = ['full_name'];

    public function getFullNameAttribute()
    {
        return 'giang le';
    }

    public function translations()
    {
        return $this->hasMany(ProductTranslation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
