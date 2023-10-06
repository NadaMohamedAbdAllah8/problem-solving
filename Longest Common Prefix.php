<?php

use Solution as GlobalSolution;

$solution = new GlobalSolution();
$strs2 = ["dog","racecar","car"];
$strs1 = ["flower", "flow", "flight"];
$strs3 = ["ab", "a"];
echo $solution->longestCommonPrefix($strs1);
echo '<hr>';
echo $solution->longestCommonPrefix($strs2);
echo '<hr>';
echo $solution->longestCommonPrefix($strs3);


class Solution
{
    public function longestCommonPrefix($strs)
    {
        $words_count = count($strs);

        if ($words_count == 1) {
            return $strs[0];
        }

        $prefix = $strs[0];
        $prefix_length = strlen($prefix);

        for ($i = 1; $i < $words_count; $i++) {
            $word_length = strlen($strs[$i]);

            if($prefix_length > $word_length) {
                $prefix = substr($prefix, 0, $word_length);
                $prefix_length = strlen($prefix);
            }

            for($j = 0;$j < $word_length;$j++) {
                if($prefix[$j] != $strs[$i][$j]) {
                    $prefix = substr($prefix, 0, $j);
                }
            }
        }

        return $prefix;
    }
}
