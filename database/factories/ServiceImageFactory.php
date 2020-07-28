<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Service_Image;
use Faker\Generator as Faker;

$factory->define(Service_Image::class, function (Faker $faker , $params) {
    return [
        "real_id" => $params['service_id'],
        "is_master" => 1,
        "url" => "image"// $faker->imageUrl($width = 640, $height = 480),
    ];
});

