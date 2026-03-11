<?php

print_r( moveZeros([1, 2, 0, 0, 3]));

function moveZeros(&$numbers): void
{
    $insertIndex = moveNonZeros($numbers);

    fillWithZeros(insertIndex: $insertIndex, numbers: $numbers);
}

function moveNonZeros(&$numbers): int
{
    $insertIndex = 0;

    for ($i = 0; $i < count($numbers); $i++) {
        if ($numbers[$i] != 0) {
            $numbers[$insertIndex] = $numbers[$i];
            $insertIndex++;
        }
    }

    return $insertIndex;
}

function fillWithZeros($insertIndex, &$numbers)
{
    while ($insertIndex < count($numbers)) {
        $numbers[$insertIndex] = 0;
        $insertIndex++;
    }
}