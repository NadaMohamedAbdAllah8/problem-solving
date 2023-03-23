<?php

use Solution as GlobalSolution;

$solution = new GlobalSolution();

/**test cases
 * [1]
 * [4,1,2,1,2]
 * [2,2,1]
 */
echo '<br>singleNumber?' .
$solution->singleNumber([4, 1, 2, 1, 2]);

//echo '<br>';

echo '<br>singleNumber?' . $solution->singleNumber([2, 2, 1]);
//echo '<br>';

echo '<br>singleNumber?' . $solution->singleNumber([1]);

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function singleNumber($nums)
    {
        $length = count($nums);

        if ($length == 0) {
            return null;
        }

        if ($length == 1) {
            return $nums[0];
        }

        $single_number = null;

        // number => count
        $keep_arr = [0 => 0];

        $single_number = $nums[0];

        for ($i = 0; $i < $length; $i++) {

            //  echo '  $single_number=' . $single_number . '<br>';
            if (array_key_exists($nums[$i], $keep_arr) &&
                $keep_arr[$nums[$i]] == 1) {

                $keep_arr[$nums[$i]]++;

                if ($single_number == $nums[$i]) {
                    $single_number = null;
                }

            } else {
                $keep_arr[$nums[$i]] = 1;
                $single_number = $nums[$i];

            }

        }

        // print_r($keep_arr);
//
        $position = array_search(1, $keep_arr, true);
        //  echo '  $position=' . $position;
        return $position;
    }
}