<?php

function findMaxAvg(array $numbers, int $maxLength)
{
    $windowSum = array_sum(array_slice($numbers, 0, $maxLength)); // first window sum
    $maxSum = $windowSum;
    $length = count($numbers);

    for ($i = $maxLength; $i < $length; $i++) {
        $windowSum = $windowSum - $numbers[$i - $maxLength] + $numbers[$i + 1];// next window sum

        $maxSum = max($maxSum, $windowSum);
    }

    return $maxSum / $maxLength;
}