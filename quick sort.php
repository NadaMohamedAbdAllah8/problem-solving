<?php

print_r(quickSort([1, 5, 3, 7, 20, 8, 100, 6]));

function quickSort($arr)
{
    $length = count($arr);

    if ($length < 2) {
        return $arr;
    }

    $pivot_index = floor((0 + $length) / 2);

    $less_than_pivot = [];

    $greater_than_pivot = [];

    for ($i = 0; $i < $length; $i++) {
        if ($i == $pivot_index) {
            continue;
        }

        // insert into less_than_pivot
        if ($arr[$i] <= $arr[$pivot_index]) {
            $less_than_pivot[] = $arr[$i];

        } else {
            $greater_than_pivot[] = $arr[$i];
        }
    }

    return array_merge(quickSort($less_than_pivot),
        [$arr[$pivot_index]],
        quickSort($greater_than_pivot));
}