<?php

use Solution as GlobalSolution;

$m = 3;
$n = 7;

$solution = new GlobalSolution();

echo'For a ' . $m . ' x ' . $n . ' grid, the number of possible ways to reach the bottom-right corner' .
' from the top-left corner is ' . $solution->uniquePaths($m, $n);
class Solution
{
    public function uniquePaths($m, $n)
    {
        $row = array_fill(0, $n, 1);
        for ($i = 0; $i < $m - 1; $i++) {
            $new_row = array_fill(0, $n, 1);
            for ($j = $n - 2; $j >= 0; $j--) {
                $new_row[$j] = $new_row[$j + 1] + $row[$j];
            }
            $row = $new_row;
        }
        return $row[0];
    }
}