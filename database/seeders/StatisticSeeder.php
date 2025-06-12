<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Statistic::create([
            'students_count' => 0,
            'teachers_count' => 0,
            'staff_count' => 0,
            'alumni_count' => 0,
        ]);
    }
}
