<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FitsWithTranslation extends Model
{
    protected $table = 'fits_with_translation';
    public $timestamps = false;
    protected $fillable = ['name', 'image', 'banner'];
}