<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;


class ControlDaySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(\App\ControlDay::class, 1)->create();
    }
}
