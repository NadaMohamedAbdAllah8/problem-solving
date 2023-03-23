<?php

use Solution as GlobalSolution;

$solution = new GlobalSolution();

/**test cases
 * [1,2,3,1]
 * [1,2,3,4]
 * [1, 1, 1, 3, 3, 4, 3, 2, 4, 2]
 */
echo '<br>containsDuplicate?' .
$solution->containsDuplicate([1, 2, 3, 4]);

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    public function containsDuplicate($nums)
    {
        $length = count($nums);

        if ($length <= 1) {
            return false;
        }

        // number => count
        $keep_arr = [0 => 0];

        for ($i = 0; $i < $length; $i++) {

            if (array_key_exists($nums[$i], $keep_arr) &&
                $keep_arr[$nums[$i]] == 1) {
                // echo 'key exists<br>number=' . $nums[$i] .
                // '<br>hash table=' . print_r($keep_arr);

                return true;
            }

            //  echo '<br>hash table= ' . print_r($keep_arr);

            $keep_arr[$nums[$i]] = 1;
            //  echo 'keep_arr[$nums[$i]]=' . $keep_arr[$nums[$i]] . '<br>';
            // echo '$nums[$i]=' . $nums[$i] . '<br>';

        }

        return false;

    }
}
