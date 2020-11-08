<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

<<<<<<< HEAD
$factory->define(\App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        'slug' => $faker->slug,
=======
$factory->define(Model::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'description' => $faker->sentence,
        'slug'=> $faker->slug
>>>>>>> 3df03da3ebe39c7378f7cbafe7793a651828bf7b
    ];
});
