<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer_occasionTranslation extends Model
{
    protected $table = 'offer_occasion_translation';
    public $timestamps = false;
    protected $fillable = ['name'];
}
