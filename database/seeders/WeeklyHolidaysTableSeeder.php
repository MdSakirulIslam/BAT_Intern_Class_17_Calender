<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WeeklyHoliday;

class WeeklyHolidaysTableSeeder extends Seeder
{
    public function run()
    {
        // Weekly holidays: Friday and Saturday
        WeeklyHoliday::create(['day' => 'Friday']);
        WeeklyHoliday::create(['day' => 'Saturday']);
    }
}
