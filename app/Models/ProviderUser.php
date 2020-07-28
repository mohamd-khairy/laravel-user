<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ProviderUser extends Model
{

    public $table = 'ProviderUsers';

    protected $appends = [
        'personal_image',
    ];

    const gender = [
        '1' => 'Male',
        '0' => 'Female',
    ];

    protected $dates = [
        'created_at',
        'updated_at',

        'date_of_birth',
        'email_verified_at',
    ];

    protected $fillable = [
        'email',
        'gender',
        'last_name',
        'job_title',
        'first_name',
        'national_id',
        'created_at',
        'updated_at',

        'provider_id',
        'middle_name',
        'date_of_birth',
        'personal_phone',
        'personal_image',
        'email_verified_at',
        'password'
    ];


    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    // public function getDateOfBirthAttribute($value)
    // {
    //     return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    // }

    // public function setDateOfBirthAttribute($value)
    // {
    //     $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    // }

    // public function getEmailVerifiedAtAttribute($value)
    // {
    //     return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    // }

    // public function setEmailVerifiedAtAttribute($value)
    // {
    //     $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    // }
}
