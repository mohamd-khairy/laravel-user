<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\provider;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(provider::class, function (Faker $faker) {
    return [
        "brand_name" => $faker->name,
        "hotline" => $faker->phoneNumber,
        "official_email" => "evntoo@evntoo.com",
        "logo" => null, // $faker->imageUrl($width = 640, $height = 480),
        'status' => 1
    ];
});
