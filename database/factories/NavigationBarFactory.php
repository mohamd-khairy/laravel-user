<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Nav_bar;
use Faker\Generator as Faker;

    $fakerAr = \Faker\Factory::create('ar_JO');

$factory->define(Nav_bar::class, function (Faker $faker) use ($fakerAr) {


    return [
        'name_en' => $faker->firstName,
        'name_ar' => $fakerAr->firstName,
        'link' => $faker->url,
        'active' => 1,

    ];
});
