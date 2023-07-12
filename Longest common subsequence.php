<?php

$str_1='fish';
$str_2='fosh';

$str_3='hello';
$str_4='hey';

echo longestCommonSubsequence($str_1, $str_2);

function longestCommonSubsequence($str_1, $str_2)
{
    $count_str_1 = strlen($str_1);
    $count_str_2 = strlen($str_2);

    if ($count_str_1 == 0 || $count_str_2==0) {
        return 0;
    }
    $grid = [[]];

    for ($index_str_1 = 0; $index_str_1 < $count_str_1; $index_str_1++) {
        for ($index_str_2 = 0; $index_str_2 < $count_str_2; $index_str_2++) {
            if ($str_1[$index_str_1] == $str_2[$index_str_2]) {
                if(($index_str_1 - 1>=0)&&($index_str_2 - 1>=0)) {
                    $grid[$index_str_1][$index_str_2] =
                     $grid[$index_str_1 - 1][$index_str_2 - 1]+1;
                } else { // first letters in the grid
                    $grid[$index_str_1][$index_str_2] = 1;
                }
            } else {
                $grid[$index_str_1][$index_str_2] =max($grid[$index_str_1-1][$index_str_2],
                 $grid[$index_str_1][$index_str_2-1]);
            }
        }
    }

    return $grid[$count_str_1-1][$count_str_2-1];
}