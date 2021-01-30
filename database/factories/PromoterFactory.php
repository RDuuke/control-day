<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Promoter::class, function (Faker $faker) {
    return [
       'name' => $faker->name,
       'last_name' => $faker->lastName,
       'document' => mt_rand(1000000, 999999999),
       'deleted' => '0'
    ];
});
