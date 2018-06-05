<?php
namespace App\Traits;

use App\Language;

trait LangRelationshipTrait
{
    public function lang()
    {
        return $this->belongsTo(Language::class, 'lang_code', 'code');
    }
}