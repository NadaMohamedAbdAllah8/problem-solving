<?php

class Solution
{

    /**
     * @param integer[] $nums
     * @param integer $target
     * @return integer[]
     */
    // nums [3,2,3]
    // target 6
    // solution [0,2]
    public function twoSum($nums, $target)
    {
        $length = count($nums);

        for ($i = 0; $i < $length; $i++) {

            for ($j = $length - 1; $j > 0; $j--) {

                if ($i == $j) {
                    continue;
                }

                if ($nums[$i] + $nums[$j] == $target) {
                    return [$i, $j];
                }

            }
        }

        return [];
    }
}