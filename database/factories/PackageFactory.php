<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Packages;
use Faker\Generator as Faker;

$fakerAr = \Faker\Factory::create('ar_JO');

$factory->define(Packages::class, function (Faker $faker) use ($fakerAr ) {
    return [
        'provider_id' => 1,
        'name:en' => $faker->firstName,
        'description:en' => $faker->realText,
        'name:ar' => $fakerAr->firstName,
        'description:ar' => $fakerAr->realText,
        'price_value' => $faker->numberBetween($min = 1, $max = 100),
        "date_from" => $faker->date($format = 'Y-m-d', $max = 'now'),
        "date_to" => date('Y-m-d', strtotime('+2 years')),
        'image' => null// $faker->imageUrl($width = 640, $height = 480)
    ];
});
