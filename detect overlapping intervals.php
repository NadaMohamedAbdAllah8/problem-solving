<?php

$intervals = [[1, 3], [5, 7], [2, 4], [6, 8]];

echo overLapping($intervals);
function overLapping($intervals): bool
{
    // sort O(n log(n))
    usort($intervals, function ($a, $b) {
        return $a[0] - $b[0];
    });

    //  print_r($intervals);

    $length = count($intervals);

    for ($i = 1; $i++; $i < $length) {
        if ($intervals[$i - 1][1] > $intervals[$i][0]) {
            return true;
        }
    }

    return false;
}
