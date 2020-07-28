<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    //

    protected $table = 'provider';

    protected $fillable = [
        "brand_name", "logo", "business_type", "hotline", "official_email",
        "status", "man_power_number", "visit_number"
    ];

    public function Business_type()
    {
        return $this->belongsToMany(Business_type::class, 'provider_business_type');
    }

    public function getLogoAttribute($image)
    {
        return $image ? env('CDN_read_path') . $image : null;
    }
}