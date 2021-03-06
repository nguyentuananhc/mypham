<?php

namespace App;

use App\Traits\LangRelationshipTrait;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $guarded = ['id'];

    use LangRelationshipTrait;
}
