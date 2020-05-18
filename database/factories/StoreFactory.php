<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Store::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        "description" => $faker->sentence,
        "phone" => $faker->phoneNumber,
        "mobile_phone" => $faker->phoneNumber,
        "slug" => $faker->slug

    ];
});

