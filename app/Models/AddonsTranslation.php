<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddonsTranslation extends Model
{
    protected $table = 'addons_translation' ;
    public $timestamps = false;
    protected $fillable = ['name','description'];

}
