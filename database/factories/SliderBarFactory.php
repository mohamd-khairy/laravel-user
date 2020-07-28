<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\sliderBar;
use Faker\Generator as Faker;

$factory->define(sliderBar::class, function (Faker $faker) {
    return [
        'image_en' => null,// $faker->imageUrl($width= 640, $height = 480, 'cats', true, 'Faker', true),

        'image_ar' => null,//  $faker->imageUrl($width= 640, $height = 480, 'cats', true, 'Faker', true),

        'title' => $faker->realText($maxNbChars = 10),

        'type' => $faker->word,

        'link' => $faker->url,

        'navigation' => $faker->word ,

        'start_date' => $faker->dateTimeBetween($startDate = '2019-01-01', $endDate = '2020-12-30'),

        'end_date' => $faker->dateTimeBetween($startDate, '+1 years'),
        'active' => 1,
    ];
});
