<?php

/**You are given a string s consisting of only uppercase English letters and an integer k.

You may replace at most k characters with any other uppercase letter.

Return the length of the longest substring that can be made of the same letter after performing at most k replacements.

Example 1

Input

s = "ABAB"
k = 2

Output

4

Explanation

Replace the two 'A's with 'B's */

function findLongestRepeatingCharacterReplacement(string $s, int $k): int
{
    $maxLength = 0;
    $maxCount = 0;
    $count = [];
    $left = 0;

    for ($right = 0; $right < strlen($s); $right++) {
        $count[$s[$right]] = ($count[$s[$right]] ?? 0) + 1;
        $maxCount = max($maxCount, $count[$s[$right]]);

        while (($right - $left + 1) - $maxCount > $k) {
            $count[$s[$left]]--;
            $left++;
        }

        $maxLength = max($maxLength, $right - $left + 1);
    }

    return $maxLength;
}