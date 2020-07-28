<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackagesTranslation extends Model
{
    protected $table = 'packages_translation';
    public $timestamps = false;
    protected $fillable = ['name','description'];
}
