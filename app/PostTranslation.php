<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    protected $guarded = ['id'];

    public function lang()
    {
        return $this->belongsTo(Language::class, 'lang_code', 'code');
    }
}
