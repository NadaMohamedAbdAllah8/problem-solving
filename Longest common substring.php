<?php

$str_1='fish';
$str_2='hish';

$str_3='hello';
$str_4='hey';

echo longestCommonSubstring($str_3, $str_4);

function longestCommonSubstring($str_1, $str_2)
{
    $count_str_1 = strlen($str_1);
    $count_str_2 = strlen($str_2);

    if ($count_str_1 == 0 || $count_str_2==0) {
        return 0;
    }

    $largest_substring = 0;

    $grid = [[]];

    for ($index_str_1 = 0; $index_str_1 < $count_str_1; $index_str_1++) {
        for ($index_str_2 = 0; $index_str_2 < $count_str_2; $index_str_2++) {
            if ($str_1[$index_str_1] == $str_2[$index_str_2]) {
                if(($index_str_1 - 1>=0)&&($index_str_2 - 1>=0)) {
                    $grid[$index_str_1][$index_str_2] = $grid[$index_str_1 - 1][$index_str_2 - 1]+1;
                } else {
                    $grid[$index_str_1][$index_str_2] = 1;
                }
                $largest_substring = max($largest_substring, $grid[$index_str_1][$index_str_2]);
            } else {
                $grid[$index_str_1][$index_str_2] =  0;
            }
        }
    }

    return $largest_substring;
}