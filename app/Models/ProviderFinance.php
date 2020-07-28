<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProviderFinance extends Model
{
    protected $table = 'provider_finance';
    protected $fillable = [

       "provider_id","account_name", "bank_name" , "bank_account" , "swift_code" , "iban_code" ,
        "expired_date","payment_option" 
        ];
}
