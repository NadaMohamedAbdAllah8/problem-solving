<?php

$arr = [-1, 0, 3, 5, 9, 12];
var_dump($arr);
//$binary_search = new BinarySearch();

$right = count($arr) - 1;
echo '<br>right=' . $right;
echo 'exists in arr? ' . binarySearch($arr, 9, 0, $right);

// class BinarySearch
// {

function binarySearch($arr, $target, $left = 0, $right)
{
    $mid = floor($left + $right / 2);

    if ($right < $left) {
        return false;
    }

    $mid = floor(($right + $left) / 2);

    if ($arr[$mid] == $target) {
        return true;
    } else if ($arr[$mid] > $target) {
        $new_right = $mid - 1;

        return binarySearch($arr, $target, $left, $mid - 1);

    } else { //$arr[$mid] > $target
        $new_left = $mid + 1;

        return binarySearch($arr, $target, $mid + 1, $right);
    }
}
//}