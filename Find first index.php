<?php
/**Given a sorted array of integers that may contain duplicates, return the index of the first occurrence of target.

If target does not exist, return -1.

Example:

nums = [1, 2, 2, 2, 3, 4]
target = 2

Output:

1 */

echo findFirstIndex([1, 2, 2, 2, 3, 4], 2);

function findFirstIndex(array $array, int $target): int
{
    $targetIndex = -1;

    $left = 0;
    $right = count($array) - 1;
    $mid = (int) ceil(($left + $right) / 2);

    while ($left <= $right) {
        if ($array[$mid] === $target) {
            $targetIndex = $mid;
            $right = $mid - 1;
        } elseif ($array[$mid] < $target) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
        $mid = (int) ceil(($left + $right) / 2);
    }

    return $targetIndex;
}
