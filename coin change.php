<?php
// Similar to the ATM problem

use Solution as GlobalSolution;

// 1st test
$amount = 3;
$coins = [2];

// 2nd test
$amount_2 = 250;
$coins_2 = [10, 20, 50, 100, 200];

$solution = new GlobalSolution();
echo '<hr>For the amount ' . $amount_2 . ' ,and the coins ' . implode(',', $coins_2)
    . ' there are ' . $solution->coinChange($coins_2, $amount_2) . ' min possible changes';

class Solution
{
    public function coinChange($coins, $amount)
    {
        $count = $amount + 1;
        $max_value = PHP_INT_MAX;
        $results =  array_fill(0, $count, $max_value);
        $results[0] = 0;
        $selectedCoins = array_fill(0, $count, []);

        for ($i = 1; $i < $count; $i++) {
            foreach ($coins as $coin) {
                echo '$coin=' . $coin;
                if ($i >= $coin) {
                    $check_index = $i - $coin;
                    $results[$i] = min($results[$i], $results[$check_index] + 1);

                    $selectedCoins[$i] = array_merge($selectedCoins[$check_index], [$coin]);
                }
            }
        }

        if ($results[$amount] == $max_value) {
            return -1;
        }

        echo ' the selected coins=' . implode(',', $selectedCoins[$amount]);

        return $results[$amount];
    }
}