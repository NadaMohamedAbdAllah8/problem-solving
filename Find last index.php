<?php
/**Given a sorted array of integers that may contain duplicates, return the index of the Last occurrence of target.

If target does not exist, return -1.

Example:

nums = [1, 2, 2, 2, 3, 4]
target = 2

Output:

3 */

echo findLastIndex([1, 2, 2, 2, 3, 4], 2);

function findLastIndex(array $array, int $target): int
{
    $lastTargetIndex = -1;

    $left = 0;
    $right = count($array) - 1;
    $mid = (int) ceil(($left + $right) / 2);

    while ($left <= $right) {
        if ($array[$mid] === $target) {
            $lastTargetIndex = $mid;
            $left = $mid + 1;
        } elseif ($array[$mid] < $target) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
        $mid = (int) ceil(($left + $right) / 2);
    }

    return $lastTargetIndex;
}
