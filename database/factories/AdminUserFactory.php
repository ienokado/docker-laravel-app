<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AdminUser;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(AdminUser::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => password_hash('password', PASSWORD_DEFAULT),
        'remember_token' => Str::random(10),
    ];
});
