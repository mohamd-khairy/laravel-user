<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class neighborhood extends Model
{
    protected $table = 'neighborhood';
    const STATUS_RADIO = [
        '1' => 'Active',
        '0' => 'un active',
    ];

    const SHOW_IN_HOME_PAGE_RADIO = [
        '1' => 'Show',
        '0' => 'Hide',
    ];
    
    protected $fillable = [
        'neighborhood_key',
        'neighborhood_en',
        'neighborhood_ar',
        'image',
        'show_in_home_page',
        'active',
    ];

}
