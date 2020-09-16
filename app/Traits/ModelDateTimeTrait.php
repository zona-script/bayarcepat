<?php

namespace App\Traits;


use Illuminate\Support\Carbon;

trait ModelDateTimeTrait
{
    public function getCreatedAtRawAttribute($value)
    {
        return $this->makeTimeFromSomeValue($this->created_at);
    }

    public function getUpdatedAtRawAttribute($value)
    {
        return $this->makeTimeFromSomeValue($this->updated_at);
    }

    private function makeTimeFromSomeValue($value)
    {
        $carbon = Carbon::parse($value);
        $raw = [
            'year' => $carbon->year,
            'month' => $carbon->month,
            'month_name' => $carbon->monthName,
            'day' => $carbon->day,
            'day_name' => $carbon->dayName,
            'week' => $carbon->week,
            'week_number_in_month' => $carbon->weekNumberInMonth,
            'time' => $carbon->toTimeString(),
            'hour' => $carbon->hour,
            'minutes' => $carbon->minute,
            'second' => $carbon->second,
            'date_time' => $carbon->toDateTime()
        ];

        return $raw;
    }
}
