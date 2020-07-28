<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Faq extends Model implements TranslatableContract
{
    use Translatable, SearchableTrait;

    public $translatedAttributes = ['ask', 'answer'];

    protected $fillable = ['ask_category_id', 'status', 'created_at', 'updated_at'];

    protected $searchable = [
        'columns' => [
            'faq_translations.ask' => 10,
            'faq_translations.answer' => 10,
        ],
        'joins' => [
            'faq_translations' => ['faqs.id', 'faq_translations.faq_id'],
        ],
    ];


    public function category()
    {
        return $this->belongsTo(AskCategory::class, 'ask_category_id');
    }
}
