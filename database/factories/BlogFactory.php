<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\blogs;
use Faker\Factory;
use Faker\Generator as Faker;

$fakerAr = \Faker\Factory::create('ar_JO');

$factory->define(blogs::class, function (Faker $faker) use ($fakerAr) {

    return [
        //
        'title_en' => $faker->realText($maxNbChars = 10),

        'title_ar' => $fakerAr->realText($maxNbChars = 10),

        'image_en' => null, //   $faker->imageUrl($width= 640, $height = 480, 'cats', true, 'Faker', true),
        'image_ar' => null, //  $faker->imageUrl($width= 640, $height = 480, 'cats', true, 'Faker', true),
        'link' => $faker->url,

        'blog_date' => $faker->dateTimeBetween($startDate = '2019-01-01', $endDate = 'now'),
        'active' => 1,


    ];
});
