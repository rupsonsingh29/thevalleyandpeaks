<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function local($date, string $format = 'M d, Y h:i A'): ?string
    {
        if (! $date) {
            return null;
        }

        // $timezone = session('timezone', config('app.display_timezone', 'UTC'));

                $timezone = session('timezone', 'UTC');


        return Carbon::parse($date)
            ->timezone($timezone)
            ->format($format);
    }
}