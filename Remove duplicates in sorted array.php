<?php

function removeDuplicates(&$numbers): void
{
    $latestUniqueIndex = getLatestUniqueIndex($numbers);
    fillWithNull(latestUniqueIndex: $latestUniqueIndex, numbers: $numbers);
}

function getLatestUniqueIndex(&$numbers): int
{
    $latestUniqueIndex = 1;

    for ($i = 1; $i < count($numbers); $i++) {
        if ($numbers[$i] != $numbers[$i - 1]) {
            $numbers[$latestUniqueIndex] = $numbers[$i];
            $latestUniqueIndex++;
        }
    }

    return $latestUniqueIndex;
}

function fillWithNull($latestUniqueIndex, &$numbers)
{
    while ($latestUniqueIndex < count($numbers)) {
        $numbers[$latestUniqueIndex] = null;
        $latestUniqueIndex++;
    }
}
