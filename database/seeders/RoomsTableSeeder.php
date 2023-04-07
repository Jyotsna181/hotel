<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomsTableSeeder extends Seeder
{
    public function run()
    {
        Room::create([
            'name' => 'Standard Room',
            'type' => 'Standard',
            'gst'=> 120,
            'price' => 1000
        ]);
        Room::create([
            'name' => 'Executive Suite Room',
            'type' => 'Suite',
            'gst'=> 335,
            'price' => 2000
        ]);
        Room::create([
            'name' => 'Deluxe Room',
            'type' => 'Deluxe',
            'gst'=> 600,
            'price' => 1500
        ]);
        Room::create([
            'name' => 'Mixed Room',
            'type' => 'Mixed',
            'gst'=> 120,
            'price' => 1500
        ]);
    }
}

