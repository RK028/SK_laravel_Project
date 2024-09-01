<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        Location::insert([
            ['name' => 'Location 1'],
            ['name' => 'Location 2'],
            ['name' => 'Location 3'],
        ]);
    }
}
