<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blogs extends Model
{
    protected $table = 'blogs';
    const ACTIVE_RADIO = [
        '1' => 'Active',
        '0' => 'un active',
    ];
    protected $fillable = [
        'link',
        'active',
        'image_en',
        'image_ar',
        'title_en',
        'title_ar',
        'blog_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    /*using date mutators to able to customize view to date as formate we select
    *
     * we must put selected date in protected $dates variable in model
     * and in resourse view as format
     */

    protected $dates = [
        'blog_date'
    ];

}
