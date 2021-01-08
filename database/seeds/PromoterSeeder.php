<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PromoterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 0; $i < 17; $i++) {
         factory(\App\Promoter::class, function (Faker $faker) {
            return [
               'name' => $faker->name,
               'last_name' => $faker->lastName,
               'document' => $faker->creditCardNumber
            ];
         })->create();
      }
    }
}
