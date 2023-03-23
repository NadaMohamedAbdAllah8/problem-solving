<?php

echo sum([1, 2, 3], 3);

function sum($arr, $length)
{

    if ($length == 1) {
        return $arr[0];
    }

    return $arr[$length - 1] + sum($arr, $length - 1);
}