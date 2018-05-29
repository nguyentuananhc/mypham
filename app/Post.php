<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function translations()
    {
        return $this->hasMany(PostTranslation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
