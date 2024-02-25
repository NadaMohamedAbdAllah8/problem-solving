<?php

$capacity_in_total = 100;
$weights = [10, 20, 50, 100, 200];
$values = [1, 1, 1, 1, 1];
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
        knapsack(
            $capacity_in_total - $weights[$item_index],
            $weights,
            $values,
            $item_index
        );

    return max($previous_max, $current_item_and_remaining_weight);
}
// ----------------------------------------------------------------


// Example usage:
$capacity = 6;
$weights = [3, 1, 2, 2, 1];
$values = [10, 3, 9, 5, 6];
$num_items = count($weights);

$picked_items = array_fill(0, $num_items, false);
$max_value = knapsackWithPickedItems($capacity, $weights, $values, $num_items, $picked_items);

echo "<hr>Maximum value: $max_value\n";
echo "Picked items: ";
for ($i = 0; $i < $num_items; $i++) {
    if ($picked_items[$i]) {
        echo "Item " . ($i + 1) . " ";
    }
}

function knapsackWithPickedItems(
    $capacity_in_total,
    $weights,
    $values,
    $current_item,
    &$picked_items
) {
    $item_index = $current_item - 1;

    if ($capacity_in_total == 0 || $current_item == 0) {
        return 0;
    }

    // item weighs more than the total capacity
    if ($weights[$item_index] > $capacity_in_total) {
        return knapsackWithPickedItems(
            $capacity_in_total,
            $weights,
            $values,
            $item_index,
            $picked_items
        );
    }

    $previous_max = knapsackWithPickedItems($capacity_in_total, $weights, $values, $item_index, $picked_items);

    $current_item_and_remaining_weight = $values[$item_index] +
        knapsackWithPickedItems($capacity_in_total - $weights[$item_index], $weights, $values, $item_index, $picked_items);

    // Check which option results in a higher value and update the picked_items array accordingly
    if ($previous_max > $current_item_and_remaining_weight) {
        $picked_items[$item_index] = false;
        return $previous_max;
    } else {
        $picked_items[$item_index] = true;
        return $current_item_and_remaining_weight;
    }
}
