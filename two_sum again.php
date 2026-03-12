<?php

print_r(twoSum([2, 7, 11, 15], 9));
echo '<br>';
print_r(twoSum([2, 7, 11, 15], 6));
echo '<br>';
print_r(twoSum([2, 3, 4], 6));

function twoSum(array $numbers, int $target): array
{
    $count = count($numbers);
    $right = 0;
    $left = $count - 1;

    while ($right < $left) {
        $sum = $numbers[$right] + $numbers[$left];
        if ($sum == $target) {
            return [$right + 1, $left + 1];
        }

        if ($sum > $target) {
            $left--;
        } else {
            $right++;
        }
    }

    return [];
}