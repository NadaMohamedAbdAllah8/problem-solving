<?php
/**
 * Minimum Size Subarray Sum

Given an array of positive integers nums and a positive integer target, return the smallest length of a contiguous subarray whose sum is greater than or equal to target.

If no such subarray exists, return 0.

Example:

nums = [2,3,1,2,4,3]
target = 7

Output:

2

Because:

[4,3]

has sum 7, and there is no valid subarray of length 1.
 */

echo getMinSubArrayLength([2, 3, 1, 2, 4, 3], 7);

function getMinSubArrayLength(array $nums, int $target): int
{
    $length = count($nums);
    $left = 0;
    $sum = 0;
    $minLength = $length + 1;

    for ($right = 0; $right < $length; $right++) {
        $sum += $nums[$right];

        while ($sum >= $target) {
            $minLength = min(
                $minLength,
                $right - $left + 1
            );

            $sum -= $nums[$left];
            $left++;
        }
    }

    return $minLength === $length + 1 ? 0 : $minLength;
}