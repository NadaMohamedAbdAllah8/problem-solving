<?php

use Solution as GlobalSolution;

$amount = 3;
$coins = [2];
$amount_2 =11;
$coins_2 =[1,2,5];

$solution = new GlobalSolution();
echo $solution->coinChange($coins_2, $amount_2).' min possible changes';

class Solution
{
    public function coinChange($coins, $amount)
    {
        $count = $amount + 1;
        $max_value=PHP_INT_MAX;
        $results =  array_fill(0, $count, $max_value);
        $results[0] = 0;
        $selectedCoins = array_fill(0, $count, []);

        for ($i = 1; $i < $count; $i++) {
            foreach ($coins as $coin) {
                if ($i>=$coin) {
                    $check_index=$i - $coin;
                    $results[$i] = min($results[$i], $results[$check_index] + 1);

                    $selectedCoins[$i] = array_merge($selectedCoins[$check_index], [$coin]);
                }
            }
        }
        
        if($results[$amount]==$max_value) {
            return -1;
        }

        print_r($selectedCoins[$amount]);

        return $results[$amount];
    }
}