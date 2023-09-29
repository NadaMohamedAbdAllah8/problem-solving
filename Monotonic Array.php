<?php

use Solution as GlobalSolution;

$solution = new GlobalSolution();

$nums_1 = [1,2,2,3];
$nums_2 = [6,5,4,4];
$nums_3 = [1,3,2];
echo 'nums_1 isMonotonic?' . $solution->isMonotonic($nums_1).'<br>';
echo 'nums_2 isMonotonic?' . $solution->isMonotonic($nums_2).'<br>';
echo 'nums_3 isMonotonic?' . $solution->isMonotonic($nums_3) . '<br>';


class Solution
{
    public function isMonotonic($nums)
    {
        $array_length = count($nums);

        /**
         * tone
         * 0 unknown
         * 1 increasing
         * -1 decreasing
         */
        $tone = 0;

        for($i = 0;$i < $array_length;$i++) {
            if($i + 1 == $array_length) {
                break;
            }

            if($nums[$i] > $nums[$i + 1]) {
                if($tone == 0) {
                    $tone = -1;
                } elseif($tone == 1) {
                    return false;
                }
            }


            if($nums[$i] < $nums[$i + 1]) {
                if($tone == 0) {
                    $tone = 1;
                } elseif($tone == -1) {
                    return false;
                }
            }

        }


        return true;
    }
}