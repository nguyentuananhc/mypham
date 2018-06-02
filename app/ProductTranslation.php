<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $guarded = ['id'];

    public function lang()
    {
        return $this->belongsTo(Language::class, 'lang_code', 'code');
    }
}
