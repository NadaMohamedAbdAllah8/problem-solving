<?php

echo countItems([1, 2, 3, 2, 2, 3, 8]);

function countItems($arr)
{
    if ($arr == null) {
        return 0;
    }

    // remove fisrt element
    array_shift($arr);

    return 1 + countItems($arr);
}