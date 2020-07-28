<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentTypeTranslation extends Model
{
    protected $table = 'document_type_translation';
    public $timestamps = false;
    protected $fillable = ['name'];
}
