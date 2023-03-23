<?php

use Solution as GlobalSolution;

$solution = new GlobalSolution();

echo $solution->search([-1, 0, 3, 5, 9, 12], 9);

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    public function search($nums, $target)
    {
        $right = count($nums) - 1;

        return binarySearch($nums, $target, 0, $right);
    }
}

function binarySearch($arr, $target, $left = 0, $right)
{
    $mid = floor($left + $right / 2);

    if ($right < $left) {
        return -1;
    }

    $mid = floor(($right + $left) / 2);

    if ($arr[$mid] == $target) {
        return $mid;
    } else if ($arr[$mid] > $target) {
        $new_right = $mid - 1;

        return binarySearch($arr, $target, $left, $mid - 1);

    } else { //$arr[$mid] > $target
        $new_left = $mid + 1;

        return binarySearch($arr, $target, $mid + 1, $right);
    }
}