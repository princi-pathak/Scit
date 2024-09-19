<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the months you want to add
        $months = [
            ['number' => 1, 'name' => 'January'],
            ['number' => 2, 'name' => 'February'],
            ['number' => 3, 'name' => 'March'],
            ['number' => 4, 'name' => 'April'],
            ['number' => 5, 'name' => 'May'],
            ['number' => 6, 'name' => 'June'],
            ['number' => 7, 'name' => 'July'],
            ['number' => 8, 'name' => 'August'],
            ['number' => 9, 'name' => 'September'],
            ['number' => 10, 'name' => 'October'],
            ['number' => 11, 'name' => 'November'],
            ['number' => 12, 'name' => 'December'],
        ];

        // Insert months into the 'months' table
        foreach ($months as $month) {
            DB::table('months')->insert([
                'number' => $month['number'],
                'name' => $month['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
