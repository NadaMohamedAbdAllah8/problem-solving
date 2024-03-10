<?php

$solution = new Solution();

$s1  = "abcabcbb";
$s2 = "bbbbb";
$s3 = "pwwkew";

echo $solution->lengthOfLongestSubstring($s1) . '<br>';
echo $solution->lengthOfLongestSubstring($s2) . '<br>';
echo $solution->lengthOfLongestSubstring($s3) . '<br>';

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function lengthOfLongestSubstring($s)
    {
        $length = strlen($s);

        $current_unique_string = "";
        $max_unique_length = 0;

        for ($i = 0; $i < $length; $i++) {
            $position =  strpos($current_unique_string, $s[$i]);

            // character it not repeated
            if ($position === false) {
                $current_unique_string .= $s[$i];
            } else { //character is repeated
                // 1. Compare the current unique string length with the max_unique_length
                $max_unique_length = max($max_unique_length, strlen($current_unique_string));

                // 2. the new current string is the repeated character
                $current_unique_string = $s[$i];
            }
        }

        return   $max_unique_length;
    }
}