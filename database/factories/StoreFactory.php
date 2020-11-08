<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Store::class, function (Faker $faker) {
    return [
<<<<<<< HEAD
        'name' => $faker->name,
        'description' => $faker->sentence,
        'phone' => $faker->phoneNumber,
        'mobile_phone' => $faker->phoneNumber,
        'slug' => $faker->slug,
    ];
});
=======
        'name' => $faker->company,
        "description" => $faker->sentence,
        "phone" => $faker->phoneNumber,
        "mobile_phone" => $faker->phoneNumber,
        "slug" => $faker->slug

    ];
});

>>>>>>> 3df03da3ebe39c7378f7cbafe7793a651828bf7b
