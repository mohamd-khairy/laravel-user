<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Faq;
use Faker\Factory;
use Faker\Generator as Faker;

$fakerAr = \Faker\Factory::create('ar_JO');

$factory->define(Faq::class, function (Faker $faker) use ($fakerAr) {
    return [
        'ask_category_id' => $faker->numberBetween($min = 1, $max = 3),
        'ask:en' => $faker->realText($maxNbChars = 30) . ' ?',
        'answer:en' => $faker->realText,
        'ask:ar' => $fakerAr->realText($maxNbChars = 30) . ' ?',
        'answer:ar' => $fakerAr->realText,
    ];
});
