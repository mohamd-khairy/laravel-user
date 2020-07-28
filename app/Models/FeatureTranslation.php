<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureTranslation extends Model
{
    protected $table = 'feature_translation';
    public $timestamps = false;
    protected $fillable = ['name'];
}
