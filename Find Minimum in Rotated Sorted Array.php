<?php

use Solution as GlobalSolution;

$solution = new GlobalSolution();

$nums_7_elements = [4, 5, 6, 7, 0, 1, 2];
$nums_5_elements = [5, 1, 2, 3, 4];
$nums_4_elements = [11, 13, 15, 17];
$nums_3_elements = [1, 2, 3];
$nums_2_elements = [2, 1];
echo $solution->findMin($nums_2_elements);
echo ' search is done';

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function findMin($nums)
    {
        $count = count($nums);

        if ($count == 0) {
            return null;
        }
        if ($count == 1) {
            return $nums[0];
        }
        if ($count == 2) {
            if ($nums[0] < $nums[1]) {
                return $nums[0];
            } else {
                return $nums[1];
            }
        }
        return $this->getMin($nums, 0, $count - 1);
    }

    private function getMin($nums, $left = 0, $right)
    {
        // assuming that the middle element id the min
        $mid = floor($left + ($right - $left) / 2);

        echo '$left =' . $left . '<br>';
        echo '$right =' . $right . '<br>';
        echo '$mid=' . $mid . '<br>';
        echo '$nums[$mid]=' . $nums[$mid] . '<br>';
        echo '----------------------------------------------------<br>';

        if ($mid == 0 && $nums[$mid] < $nums[$mid + 1]) {
            return $nums[$mid];
        }

        if ($mid > 0 && $nums[$mid] <= $nums[$mid - 1]) {
            echo ' returning<br>';
            echo '$mid=' . $mid . '<br>';
            echo '$nums[$mid]=' . $nums[$mid] . '<br>';

            return $nums[$mid];
        }

        if ($nums[$left] <= $nums[$mid] && $nums[$mid] > $nums[$right]) {
            echo 'left is discarded<br>';
            // discard the left sub numsay as it is sorted
            return $this->getMin($nums, $mid + 1, $right);
        } else {
            echo 'right is discarded<br>';
            // discard the right sub numsay as it is sorted
            return $this->getMin($nums, $left, $mid - 1);
        }
    }

}
