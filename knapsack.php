<?php

$capacity_in_total = 6;
$weights = [3, 1, 2, 2, 1];
$values = [10, 3, 9, 5, 6];
$current_item = count($values);

echo knapsack($capacity_in_total, $weights, $values, $current_item);

function knapsack($capacity_in_total, $weights, $values, $current_item)
{
    $item_index = $current_item - 1;

    if ($capacity_in_total == 0 || $current_item == 0) {
        return 0;
    }

    // item weighs more than the total capacity
    if ($weights[$item_index] > $capacity_in_total) {
        return knapsack($capacity_in_total, $weights, $values, $item_index);
    }

    $previous_max = knapsack($capacity_in_total, $weights, $values, $item_index);

    $current_item_and_remaining_weight = $values[$item_index] +
    knapSack($capacity_in_total - $weights[$item_index],
        $weights, $values, $item_index);

    return max($previous_max, $current_item_and_remaining_weight);
}
