<?php

echo 'weird sum of [1,2,4,5]= [' .
implode(',', weirdSum([1, 2, 4, 5]))
    . ']';

// return array of the sum of every item except i
function weirdSum($arr)
{
    $arr_count = count($arr);
    $arr_sum = array_sum($arr);

    $result_array = [];

    for ($i = 0; $i < $arr_count; $i++) {
        array_push($result_array, $arr_sum - $arr[$i]);
    }

    return $result_array;
}
