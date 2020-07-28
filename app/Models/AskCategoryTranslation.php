<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AskCategoryTranslation extends Model
{
    protected $fillable = ['ask_category_id', 'name', 'locale'];

    public $timestamps = false;
}
