<?php

$prices = [3, 2, 6, 5, 0, 3];

$solution = new Solution();

echo 'max profit=' . $solution->maxProfit($prices) . '<br/>';

class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    public function maxProfit($prices)
    {
        $length = count($prices);

        $buy_day_index = 0;
        $sell_day_index = 0;
        $profit = 0;
        $test_profit = 0;

        for ($i = 1; $i < $length; $i++) {

            echo 'buy_day_index=' . $buy_day_index . '<br>';
            echo '$prices[$buy_day_index]=' . $prices[$buy_day_index];
            echo '<br>';
            echo '$prices[$i]=' . $prices[$i];
            echo '<br>';

            echo 'condition';
            echo $prices[$buy_day_index] > $prices[$i] &&
            $prices[$sell_day_index] - $prices[$i] > $profit;
            echo '<br>';

            if ($prices[$buy_day_index] > $prices[$i] &&
                $i + 1 < $length &&
                $prices[$sell_day_index] - $prices[$i] > $profit) {
                //if ($sell_day_index > $i) {

                //       $test_profit = $prices[$sell_day_index] - $prices[$buy_day_index];

                //       if ($test_profit > $profit) {
                $buy_day_index = $i;

                echo '$buy_day_index=' . $buy_day_index . '<br>';

                echo 'i=' . $i . '<br>';

                if ($i + 1 >= $length) {
                    return 0;
                }

                $sell_day_index = $i + 1;

                $profit = $prices[$sell_day_index] - $prices[$buy_day_index];

                //}
                //}
                //       $buy_day_index = $i;

                //       echo '$buy_day_index]=' . $buy_day_index;

                //       echo 'i=' . $i . '<br>';

                if ($i + 1 >= $length) {
                    return 0;
                }

                // $sell_day_index = $i + 1;

                // $profit = $prices[$sell_day_index] - $prices[$buy_day_index];
            }

            if ($prices[$sell_day_index] < $prices[$i]) {
                $sell_day_index = $i;
            }

        }

        return $prices[$sell_day_index] - $prices[$buy_day_index];

    }
}
