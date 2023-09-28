<?php

// Example usage:
$arr = [12, 11, 13, 5, 6, 7,20];
$n = count($arr);

$heap = new Heap();

// Build heap (rearrange array)
for ($i = $n / 2 - 1; $i >= 0; $i--) {
    $heap->heapify($arr, $n, $i);
}

echo implode(',', $arr);

class Heap
{
    public function heapify(&$arr, $n, $i) {
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

private function swap(&$arr, $i, $j) {
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}
  
}