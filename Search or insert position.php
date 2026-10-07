<?php
/**Search Insert Position
Given a sorted array of distinct integers and a target, return the index if the target is found.
If it is not found, return the index where it should be inserted to keep the array sorted.
Example 1
nums = [1,3,5,6]
target = 5

Output:
2 */

echo(getTargetIndex([1, 3, 5, 6], 0));
echo '<br>';
echo(getTargetIndex([1, 3, 5, 6], 5));
echo '<br>';
echo(getTargetIndex([1, 3, 5, 6], 2));
echo '<br>';
echo(getTargetIndex([1, 3, 5, 6], 7));
echo '<br>';


function getTargetIndex(array $array, int $target): int
{
    $left = 0;
    $right = count($array) - 1;
    $mid = (int) ceil(($left + $right) / 2);

    while ($left <= $right) {
        if ($array[$mid] === $target) {
            return $mid;
        }

        if ($array[$mid] < $target) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
        $mid = (int) ceil(($left + $right) / 2);
    }

    return $left;
}

