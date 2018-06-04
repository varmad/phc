<?php
namespace App\Models\Traits;

use Carbon\Carbon;

trait PhcDate {

    public function dateRangeDates($from, $to)
    {
        $from_date = Carbon::createFromFormat('d/m/Y', $from);
        $to_date = Carbon::createFromFormat('d/m/Y', $to);

        $dates = $this->generateDateRange($from_date, $to_date);

        return $dates;
    }

    private function generateDateRange(Carbon $start_date, Carbon $end_date)
    {
        $dates = [];
        for($date = $start_date; $date->lte($end_date); $date->addDay()) {
          $dates[] = $date->format('d/m/Y');
        }
        return $dates;
    }
}
