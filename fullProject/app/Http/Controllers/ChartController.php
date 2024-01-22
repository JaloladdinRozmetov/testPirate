<?php

namespace App\Http\Controllers;

use App\Models\Rent;


class ChartController extends Controller
{
    public function index()
    {
        $rents = Rent::query()->get();

        $chartArray = $this->makeChartData($rents);

        return view('chart',compact('chartArray'));
    }

    public function makeChartData($rents):array
    {
        $chartArray = [];
        foreach ($rents as $rent) {
            $startDate = \Carbon\Carbon::parse($rent['first_date']);
            $endDate = \Carbon\Carbon::parse($rent['last_date']);
            $rentCost = $rent['rent_cost'];
            $daysInDateRange = $endDate->diffInDays($startDate) + 1;
            $dailyRentCost = $rentCost / $daysInDateRange;
            for ($day = 0; $day < $daysInDateRange; $day++) {
                $currentDate = $startDate->copy()->addDays($day)->toDateString();

                if (array_key_exists($currentDate, $chartArray)) {
                    $chartArray[$currentDate] += $dailyRentCost;
                } else {
                    $chartArray[$currentDate] = $dailyRentCost;
                }
            }
        }
        ksort($chartArray);
        return $chartArray;
    }
}
