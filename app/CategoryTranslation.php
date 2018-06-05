<?php

namespace App;

use App\Traits\LangRelationshipTrait;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $guarded = ['id'];

    use LangRelationshipTrait;
}
