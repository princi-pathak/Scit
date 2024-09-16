<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeeksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Define the days of the week
          $days = [
            ['number' => 1, 'name' => 'Sunday'],
            ['number' => 2, 'name' => 'Monday'],
            ['number' => 3, 'name' => 'Tuesday'],
            ['number' => 4, 'name' => 'Wednesday'],
            ['number' => 5, 'name' => 'Thursday'],
            ['number' => 6, 'name' => 'Friday'],
            ['number' => 7, 'name' => 'Saturday'],
        ];

        // Insert days of the week into the 'weeks' table
        foreach ($days as $day) {
            DB::table('weeks')->insert([
                'number' => $day['number'],
                'name' => $day['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
