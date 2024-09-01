<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AttendanceRecord;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        // Example seeding of attendance data
        AttendanceRecord::factory()->count(50)->create();
    }
}
