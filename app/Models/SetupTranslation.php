<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SetupTranslation extends Model
{
    protected $table = 'setup_translation';
    public $timestamps = false;
    protected $fillable = ['name'];
}
