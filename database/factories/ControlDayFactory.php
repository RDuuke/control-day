<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\ControlDay::class, function (Faker $faker) {
   return [
      'promoter_id' => 1,
      'type' => 'end',
      'date' => '2021-01-06 18:20:00',
      'description' => $faker->text(100),
      'evidence' => $faker->imageUrl($width = 640, $height = 480)
   ];
});
