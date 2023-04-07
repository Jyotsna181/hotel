<?php

use Illuminate\Database\Seeder;
use Database\Seeders\RoomsTableSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoomsTableSeeder::class,
        ]);
    }
}
