<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Location;
use App\Models\Attendance;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // Seed the roles table
        // $this->call(RoleSeeder::class);

        // // Seed the locations table
        // $this->call(LocationSeeder::class);

        // Seed the users table
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Welcome@l1'),
            'role_id' => 13, // Assuming 1 is the ID for the Admin role
            'location_id' => 4 // Assuming 1 is the ID for a default location
        ]);

        // Seed additional users as needed
        User::factory()->count(10)->create();

        // Seed the attendance records table
        $this->call(AttendanceSeeder::class);
    }
}
