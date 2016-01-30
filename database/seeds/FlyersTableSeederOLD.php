<?php

use Illuminate\Database\Seeder;

class FlyersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('\App\Flyer',4)->create();
    }
}
