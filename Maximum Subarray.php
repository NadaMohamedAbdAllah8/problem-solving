<?php

use Solution as GlobalSolution;

$solution = new GlobalSolution();
$nums = [-2,1,-3,4,-1,2,1,-5,4];
$nums_2 = [1];
$nums_3 = [5,4,-1,7,8];
echo $solution->maxSubArray($nums_3);

class Solution
{
    public function maxSubArray($nums): int
    {
        if(count($nums) == 1) {
            return $nums[0];
        }

        $max = PHP_INT_MIN;

        $result = 0;

        for($i = 0;$i < count($nums);$i++) {
            if($result + $nums[$i] < $nums[$i]) {
                $result = $nums[$i];
            } else {
                $result += $nums[$i];
            }

            if($max < $result) {
                $max = $result;
            }
        }

        return $max;
    }

    public function maxSubArrayDivideAndConquer($nums): int
    {
        if(count($nums) == 1) {
            return $nums[0];
        }

        $left_max = $this->maxSubArrayDivideAndConquer(array_slice($nums, 0, count($nums)/2));
        $right_max = $this->maxSubArrayDivideAndConquer(array_slice($nums, count($nums) / 2, count($nums)));
        $max_crossing_sum = $this->maxCrossingSum();

        return max($left_max, $right_max, $max_crossing_sum);

    }

    private function maxCrossingSum(): int
    {

        return 0;
    }
}