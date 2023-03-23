<?php

echo findMax([1, 8, 100, 9, 0, 12, 12, -9]);

function findMax($arr)
{
    if (count($arr) == 1) {
        return $arr[0];
    }

    if ($arr[0] <= $arr[1]) {
        // remove fisrt element
        array_shift($arr);

    } else {
        // remove second element
        array_splice($arr, 1, 1);
    }

    return findMax($arr);
}
