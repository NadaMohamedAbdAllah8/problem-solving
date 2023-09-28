<?php

// Example usage:
$arr = [12, 11, 13, 5, 6, 7, 20];
$arr_count = count($arr);

$heap = new Heap();

// Build heap (rearrange array)
for ($i = $arr_count / 2 - 1; $i >= 0; $i--) {
    $heap->heapify($arr, $arr_count, $i);
}

echo implode(',', $arr);
echo '<hr>';

$to_be_sorted_array = [158, 10, 20, 1, 0, -9];
$arr_count = count($to_be_sorted_array);

echo 'before sorting: ' . implode(',', $to_be_sorted_array);

$heap->heapSort($to_be_sorted_array, $arr_count);
echo '<br>after sorting: ' . implode(',', $to_be_sorted_array);

echo '<hr>';
echo 'deleted=' . $heap->delete($arr, $arr_count);
echo '<br>array after deletion: ' . implode(',', $arr);

echo '<hr>';
echo 'before insertion: ' . implode(',', $arr);
$arr_count = count($arr);
$heap->insert($arr, $arr_count, 100);
$insert_val = 100;
echo '<br>value to be inserted=' . $insert_val;
echo '<br>array after insertion=' . implode(',', $arr);

class Heap
{
    public function heapSort(&$arr, $arr_count)
    {
        // Build max heap (rearrange array)
        for ($i = $arr_count / 2 - 1; $i >= 0; $i--) {
            $this->heapify($arr, $arr_count, $i);
        }

        // One by one extract an element from heap
        for ($i = $arr_count - 1; $i > 0; $i--) {
            // Move current root to end
            $this->swap($arr, 0, $i);

            $this->heapify($arr, $i, 0);
        }
    }

    public function heapify(&$arr, $arr_count, $i)
    {
        $largest = $i;
        $left = 2 * $i + 1;
        $right = 2 * $i + 2;

        if ($left < $arr_count && $arr[$left] > $arr[$largest]) {
            $largest = $left;
        }

        if ($right < $arr_count && $arr[$right] > $arr[$largest]) {
            $largest = $right;
        }

        if ($largest != $i) {
            $this->swap($arr, $i, $largest);
            $this->heapify($arr, $arr_count, $largest);
        }
    }

    public function insert(&$arr, &$n, $value)
    {
        // Increase the size of the heap
        $n++;

        // Place the new element at the end of the heap
        $i = $n - 1;
        $arr[$i] = $value;

        // Bubble up: While the parent is smaller than the current element, swap them
        while ($i != 0 && $arr[$this->parent($i)] < $arr[$i]) {
            $this->swap($arr, $i, $this->parent($i));
            $i = $this->parent($i);
        }
    }

    public function delete(&$arr, &$arr_count)
    {
        if ($arr_count <= 0) {
            return null;
        }

        // Store the maximum value, so we can return it
        $max_val = $arr[0];

        // Replace the root with the last item
        $arr[0] = $arr[$arr_count - 1];

        // Decrease the size of the heap
        $arr_count--;

        // Heapify the root node
        $this->heapify($arr, $arr_count, 0);

        return $max_val;
    }

    private function swap(&$arr, $i, $j)
    {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }

    private function parent($i)
    {
        return floor(($i - 1) / 2);
    }
}
