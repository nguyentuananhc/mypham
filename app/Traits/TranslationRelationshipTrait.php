<?php
/**
 * Created by PhpStorm.
 * User: giang
 * Date: 6/5/18
 * Time: 22:40
 */

namespace App\Traits;


trait TranslationRelationshipTrait
{
    public function translation($langCode)
    {
        return $this->translations()->where('lang_code', $langCode)->first();
    }
}