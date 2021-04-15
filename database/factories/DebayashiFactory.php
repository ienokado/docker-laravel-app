<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Debayashi;
use Faker\Generator as Faker;

$factory->define(Debayashi::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'artist_name' => $faker->name,
        'active' => 1,
    ];
});
