<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\GovernmentHoliday;
use App\Models\WeeklyHoliday;

class WorkingDaysController extends Controller
{
    // Method to render input form view
    public function showInputForm()
    {
        return view('input');
    }

    // Method to calculate working days
    public function calculateWorkingDays(Request $request)
    {
        // Validation
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Parse input dates
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = Carbon::parse($request->input('end_date'));

        $workingDays = $this->calculateWorkingDaysBetweenDates($startDate, $endDate);

        // Render output view with the calculated working days
        return view('output', ['workingDays' => $workingDays]);
    }

    // Helper method to calculate working days between two dates
    private function calculateWorkingDaysBetweenDates($startDate, $endDate)
    {
        $workingDays = 0;

        // Loop through each day between start and end dates
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            // Check if the current day is a weekend (Saturday or Sunday)
            if ($date->isWeekend()) {
                continue;
            }

            // Check if the current day is a government holiday
            if (GovernmentHoliday::whereDate('date', $date)->exists()) {
                continue;
            }

            // Check if the current day is a weekly holiday (Friday or Saturday)
            $isWeeklyHoliday = WeeklyHoliday::whereIn('day', ['Friday', 'Saturday'])->exists();


            // Increment the working days counter
            $workingDays++;
        }

        return $workingDays;
    }
}
