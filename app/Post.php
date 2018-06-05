<?php

namespace App;

use App\Traits\TranslationRelationshipTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use TranslationRelationshipTrait;
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
}
