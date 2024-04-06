<?php

namespace Database\Seeders;

use App\Models\GovernmentHoliday;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernmentHolidaysTableSeeder extends Seeder
{
    public function run()
    {
        // Add sample government holidays
        GovernmentHoliday::create(['date' => '2024-01-01', 'description' => 'New Year']);
        GovernmentHoliday::create(['date' => '2024-04-07', 'description' => 'Shab-e-qadr']);
        GovernmentHoliday::create(['date' => '2024-04-10', 'description' => 'Eid ul-Fitr']);
        GovernmentHoliday::create(['date' => '2024-04-11', 'description' => 'Eid ul-Fitr']);
        GovernmentHoliday::create(['date' => '2024-04-14', 'description' => 'Bengali-New-Year']);
        GovernmentHoliday::create(['date' => '2024-05-01', 'description' => 'Labor Day']);
        // Add more holidays as needed
    }
}
