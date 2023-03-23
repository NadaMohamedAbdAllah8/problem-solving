<?php

echo 'sorted array of [5,1,8,4,9,6,7,2,3]=' .
implode(',', selectionSort([5, 1, 8, 4, 9, 6, 7, 2, 3]));

// sorting in a increasing (ascending) order
function selectionSort($arr)
{
    $length = count($arr);
    // length -1 as the last place will be sorted
    for ($i = 0; $i < $length - 1; $i++) {
        $min = $i;
        for ($j = $i + 1; $j < $length; $j++) {
            // find the smallest value
            if ($arr[$j] > $arr[$min]) {
                $min = $j;
            }
        }
        // swap i position with min position
        $i_value = $arr[$i];
        $arr[$i] = $arr[$min];
        $arr[$min] = $i_value;
    }
    return $arr;
}