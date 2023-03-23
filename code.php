<?php

echo getWorkingDays('2021-07-23', '2021-08-11');

//The function returns the no. of business days between two dates and it skips the weekends
function getWorkingDays($start_date, $end_date)
{
    // do strtotime calculations just once
    $end_date = strtotime($end_date);
    $start_date = strtotime($start_date);

    // The total number of days between the two dates.
    // We compute the no. of seconds and divide it to 60*60*24
    // We add one to include both dates in the interval.
    $days = ($end_date - $start_date) / 86400 + 1;

    $no_full_weeks = floor($days / 7);
    $no_remaining_days = fmod($days, 7);

    /**w    Numeric representation of the day of the week
     *  0 (for Sunday) through 6 (for Saturday) */
    $first_day_of_week = date("w", $start_date);
    $last_day_of_week = date("w", $end_date);

    // just a week
    if ($first_day_of_week <= $last_day_of_week) {

        if ($first_day_of_week <= 5 && 5 <= $last_day_of_week) {
            $no_remaining_days--;
        }

        if ($first_day_of_week <= 6 && 6 <= $last_day_of_week) {
            $no_remaining_days--;
        }

    } else {
        if ($first_day_of_week == 6) {
            $no_remaining_days--;

            if ($last_day_of_week == 5) {
                $no_remaining_days--;
            }
        } else {
            $no_remaining_days -= 2;
        }
    }

    //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
    //---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
    $working_days = $no_full_weeks * 5;

    if ($no_remaining_days > 0) {
        $working_days += $no_remaining_days;
    }

    return $working_days;
}

// function getWeekDays($start, $end)
// {
//     // do strtotime calculations just once
//     $end_date = strtotime($end);
//     $start_date = strtotime($start);

//     $days = ($end_date - $start_date);
//     $number_of_days =
//         round($days / (60 * 60 * 24), 0);

//     $week_ends_count = 0;

//     for ($i = $start_date; $i <= $end_date; $i++) {

//         $day = date("N", strtotime($i));
//         if ($day == 6 || $day == 5) {
//             $week_ends_count++;
//         }
//     }

//     return $number_of_days - $week_ends_count;
// }