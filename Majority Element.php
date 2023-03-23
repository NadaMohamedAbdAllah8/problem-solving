<?php

use Solution as GlobalSolution;

$solution = new GlobalSolution();

echo ' Solution=' . $solution->majorityElement([3, 2, 3]);

class Solution
{

/**
 * @param Integer[] $nums
 * @return Integer
 */
    public function majorityElement($nums)
    {

        $majority_hash_table = [[]];

        $length = count($nums);

        if ($length == 0) {
            return -1;
        }

        for ($i = 0; $i < $length; $i++) {
            if (array_key_exists($nums[$i], $majority_hash_table)) {
                $majority_hash_table[$nums[$i]]++;
                // echo ($majority_hash_table[$nums[$i]]);
            } else {
                $majority_hash_table[$nums[$i]] = 1;
            }
        }

        //  print_r($majority_hash_table);

        // echo '<br>';

        arsort($majority_hash_table, SORT_NUMERIC);

        //echo implode(',', $array_values);

        //rsort($array_values, SORT_NUMERIC);
        // print_r($majority_hash_table);

        return array_key_first($majority_hash_table);

    }
}