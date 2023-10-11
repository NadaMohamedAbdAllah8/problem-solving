<?php

$str_1 = 'cat';
$str_2 = 'cat';

echo 'is a valid anagram?' . validAnagram($str_1, $str_2);

function validAnagram($str_1, $str_2): bool
{
    $str_1_length = strlen($str_1);
    $str_2_length = strlen($str_2);

    if($str_1_length != $str_2_length) {
        return false;
    }

    $str_1_frequency = buildFrequencyHashTable($str_1);
    $str_2_frequency = buildFrequencyHashTable($str_2);

    if(count($str_1_frequency) != count($str_2_frequency)) {
        return false;
    }

    foreach($str_1_frequency as $char => $frequency) {
        if(!array_key_exists($char, $str_2_frequency) || $frequency != $str_2_frequency[$char]) {
            return false;
        }
    }

    return true;
}

function buildFrequencyHashTable($str): array
{
    $length = strlen($str);
    $frequency = [[]];

    for($i = 0;$i < $length;$i++) {
        if(array_key_exists($str[$i], $frequency)) {
            $frequency[$str[$i]]++;
        } else {
            $frequency[$str[$i]] = 1;
        }
    }

    return  $frequency;
}
