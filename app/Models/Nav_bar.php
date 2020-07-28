<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nav_bar extends Model
{
    protected $table = 'nav_bar';
    protected $fillable = [
        "name_en","name_ar", "link" ,"active"
    ];
}
