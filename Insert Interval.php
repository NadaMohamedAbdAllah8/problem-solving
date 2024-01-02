<?php

use Solution as GlobalSolution;

$solution = new GlobalSolution();

$interval_1 = [[1, 2], [3, 5], [6, 7], [8, 10], [12, 16]];
$new_interval_1 = [4, 8];

$interval_2 = [[1, 3], [6, 9]];
$new_interval_2 = [2, 5];

$interval_3 = [[1, 3], [4, 5]];
$new_interval_3 = [6, 9];

$interval_4 = [[4, 5], [6, 9]];
$new_interval_4 = [1, 3];

// echo 'insert at the end: <br>';
// $intervals = $solution->insert($interval_3, $new_interval_3);

// foreach ($intervals as $interval) {
//     print_r($interval);
//     echo '<br>';
// }

// echo 'insert at the beginning: <br>';
// $intervals = $solution->insert($interval_4, $new_interval_4);

// foreach ($intervals as $interval) {
//     print_r($interval);
//     echo '<br>';
// }


$intervals = $solution->insert($interval_1, $new_interval_1);
echo 'insert in the middle results: <br>';
foreach ($intervals as $interval) {
    print_r($interval);
    echo '<br>';
}

class Solution
{
    public function insert($intervals, $new_interval)
    {
        $result = [];

        foreach ($intervals as  $key => $interval) {

            if ($new_interval[1] < $interval[0]) {
                $result[] = $new_interval;
                return array_merge($result, array_slice($intervals, $key));
            } elseif ($new_interval[0] > $interval[1]) {
                $result = $result + [$interval];
            } else {
                $new_interval = [
                    min($new_interval[0], $interval[0]),
                    max($new_interval[1], $interval[1])
                ];
            }
        }

        $result = $result + [$new_interval];

        return $result;
    }
}
