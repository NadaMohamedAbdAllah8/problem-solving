<?php

$s1 = "abcabcbb";
$s2 = "bbbbb";
$s3 = "pwwkew";

echo longestSubstring($s1) . '<br>';
echo longestSubstring($s2) . '<br>';
echo longestSubstring($s3) . '<br>';

function longestSubstring(string $s): int
{
    $set = [];
    $left = 0;
    $maxLength = 0;

    for ($right = 0; $right < strlen($s); $right++) {

        while (isset($set[$s[$right]])) {
            unset($set[$s[$left]]);
            $left++;
        }

        $set[$s[$right]] = true;
        $maxLength = max($maxLength, $right - $left + 1);
    }

    return $maxLength;
}
