<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use \App\Models\Notifications\Posts;

$factory->define(Posts::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title'=>$faker->unique()->word,
        'body' =>$faker->sentence(),
    ];
});
