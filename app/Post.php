<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    const STATUS_PUBLISHED = 1;
    const STATUS_UNPUBLISHED = 0;

    public function translations()
    {
        return $this->hasMany(PostTranslation::class)->with(['lang']);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function translation($langCode)
    {
        return $this->translations()->where('lang_code', $langCode)->first();
    }
}
