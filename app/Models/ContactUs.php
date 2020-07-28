<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = [
        'name', 'email', 'mobile', 'message_title', 'message', 'status', 'user_reply', 'user_id', 'created_at', 'updated_at'
    ];
}
