<?php

// Example usage:
$arr = [12, 11, 13, 5, 6, 7, 20];
$n = count($arr);

$heap = new Heap();

// Build heap (rearrange array)
for ($i = $n / 2 - 1; $i >= 0; $i--) {
    $heap->heapify($arr, $n, $i);
}

echo implode(',', $arr) . '<hr>';

$to_be_sorted_array = [158, 10, 20, 1, 0, -9];
$heap->heapSort($to_be_sorted_array, count($to_be_sorted_array));
echo implode(',', $to_be_sorted_array);

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

    public function heapify(&$arr, $n, $i)
    {
        $largest = $i;
        $left = 2 * $i + 1;
        $right = 2 * $i + 2;

        if ($left < $n && $arr[$left] > $arr[$largest]) {
            $largest = $left;
        }

        if ($right < $n && $arr[$right] > $arr[$largest]) {
            $largest = $right;
        }

        if ($largest != $i) {
            $this->swap($arr, $i, $largest);
            $this->heapify($arr, $n, $largest);
        }
    }

    private function swap(&$arr, $i, $j)
    {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }

}