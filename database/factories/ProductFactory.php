<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
<<<<<<< HEAD
        'description' => $faker->sentence,
        'body' => $faker->paragraph(5, true),
        'price' => $faker->randomFloat(2, 1,10),
        'slug' => $faker->slug

    ];
});
=======
        "description" => $faker->sentence,
        "body" => $faker->paragraph(5, true),
        "price" => $faker->randomFloat(2,1, 10),
        "slug" => $faker->slug

    ];
});


>>>>>>> 3df03da3ebe39c7378f7cbafe7793a651828bf7b
