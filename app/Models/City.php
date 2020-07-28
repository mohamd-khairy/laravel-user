<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $table = 'cities';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_RADIO = [
        '1' => 'Active',
        '0' => 'un active',
    ];

    protected $fillable = [
        'order',
        'status',
        'city_en',
        'city_ar',
        'city_key',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
