<?php

echo 'Product except self sum of [4,5,1,8,2]= [' .
implode(',', productExceptSelf([4, 5, 1, 8, 2]))
    . ']';

function productExceptSelf($arr)
{
    $arr_count = count($arr);
    $right_arr_calculation = [];
    $left_arr_calculation = [];
    $result_arr = [];

    $left_arr_calculation[0] = 1;
    $right_arr_calculation[$arr_count - 1] = 1;

    // go forward (left)
    for ($i = 1; $i < $arr_count; $i++) {
        $left_arr_calculation[$i] = $arr[$i - 1] * $left_arr_calculation[$i - 1];
    }
    echo 'left calculation=' . implode(',', $left_arr_calculation);

    // go backwards (left)
    for ($i = $arr_count - 2; $i >= 0; $i--) { // $i+1 is count-1
        $right_arr_calculation[$i] = $right_arr_calculation[$i + 1] * $arr[$i + 1];
    }
    echo '<br> right calculation=' . implode(',', $right_arr_calculation) . '<br>';

    for ($i = 0; $i < $arr_count; $i++) {
        $result_arr[$i] = $right_arr_calculation[$i] * $left_arr_calculation[$i];
    }
    return $result_arr;
}
