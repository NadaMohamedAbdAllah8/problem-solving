<?php

use Solution as GlobalSolution;

$solution = new GlobalSolution();

echo ' Solution=' . $solution->majorityElement([3, 2, 3]);

class Solution
{
    public function majorityElement(array $nums): int
    {
        $length = count($nums);

        if ($length == 0) {
            return -1;
        }

        $candidate = $nums[0];
        $candidateCount = 1;

        for ($i = 0; $i < $length; $i++) {
            if ($candidateCount == 0) {
                $candidate = $nums[$i];
            }

            if ($nums[$i] == $candidate) {
                $candidateCount++;
            } else {
                $candidateCount--;
            }
        }

        return $candidate;
    }
}
