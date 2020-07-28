<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Addons;
use App\Models\Service;
use Faker\Generator as Faker;

$fakerAr = \Faker\Factory::create('ar_JO');

$factory->define(Addons::class, function (Faker $faker) use ($fakerAr ) {
    return [
        'provider_id' => 1,
        'name:en' => $faker->firstName,
        'description:en' => $faker->realText,
        'name:ar' => $fakerAr->firstName,
        'description:ar' => $fakerAr->realText,
        'price_type' => false,
        'price_value' => $faker->numberBetween($min = 1, $max = 100),
        'business_type_id' => $faker->numberBetween($min = 9, $max = 23) ,
        'image' => null//  $faker->imageUrl($width = 640, $height = 480)
    ];
});
