<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ComedianGroup;
use Faker\Generator as Faker;

$factory->define(ComedianGroup::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        'dissolve_flg' => 0,
        'active' => 1,
    ];
});
