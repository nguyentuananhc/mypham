<?php

namespace App;

use App\Traits\LangRelationshipTrait;
use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    protected $guarded = ['id'];

    use LangRelationshipTrait;
}
