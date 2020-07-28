<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProviderOfficial extends Model
{
    protected $table = 'provider_official_data';
    protected $fillable = [

        "provider_id","document_type_id", "doc_number" , "doc_copy" , "expired_date" , "status" ,
         
         ];
}
