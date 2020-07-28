<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    protected $fillable = ['ask', 'answer', 'locale', 'faq_id'];

    public $timestamps = false;
}
