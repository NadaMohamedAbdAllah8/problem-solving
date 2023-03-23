<?php

$prices = [3, 2, 6, 5, 0, 3];

$solution = new Solution();

echo 'max profit=' . $solution->maxProfit($prices) . '<br/>';

class Solution
{
    /** * @param Integer[] $prices
     * @return Integer
     */public function maxProfit($prices)
    {
        $min = $prices[0];

        $max = 0;

        for ($i = 1; $i < count($prices); $i++) {
            if ($prices[$i] - $min > $max) {
                $max = $prices[$i] - $min;
            }

            if ($prices[$i] < $min) {
                $min = $prices[$i];
            }
        }
        return $max;

    }
}