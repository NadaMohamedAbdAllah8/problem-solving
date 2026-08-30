<?php
/**Given two strings s1 and s2, return true if s2 contains a permutation of s1 as a contiguous substring.

In other words, you're looking for a window in s2 that contains exactly the same characters, with the same frequencies, as s1.

Example 1
s1 = "ab"
s2 = "eidbaooo"

Output:

true

Because "ba" appears inside s2, and "ba" is a permutation of "ab".

Example 2
s1 = "ab"
s2 = "eidboaoo"

Output:

false

There is no contiguous window containing one a and one b.

Another example
s1 = "aabc"
s2 = "xxabacyy"

Output:

true

because:

"abac"

contains:

a → 2
b → 1
c → 1

which matches "aabc". */

echo (containsPermutation('ab', 'eidbaooo'));
echo '<br/>';
echo (containsPermutation('aabc', 'xxabacyy'));

function containsPermutation(string $subString, string $fullString): bool
{
    $subStringHashmap = createHashmap($subString);

    $subStringLength = strlen($subString);

    $i = 0;
    $j = $subStringLength;

    for ($i = 0; $i < strlen($fullString); $i++) {
        $comparedString = substr(
            $fullString,
            $i,
            $subStringLength
        );
        $comparedHashmap = createHashmap($comparedString);

        if (compareHashmaps($subStringHashmap, $comparedHashmap)) {
            return true;
        }

        $j++;
    }

    return false;
}

function createHashmap(string $str): array
{
    $hashmap = [];
    for ($i = 0; $i < strlen($str); $i++) {
        if (array_key_exists($str[$i], $hashmap)) {
            $hashmap[$str[$i]]++;
        } else {
            $hashmap[$str[$i]] = 1;
        }
    }

    return $hashmap;
}

function compareHashmaps(array $array1, array $array2): bool
{
    if (count($array1) != count($array2)) {
        return false;
    }

    foreach ($array1 as $key => $value) {
        if ((!array_key_exists($key, $array2)) || $array2[$key] != $value) {
            return false;
        }
    }

    return true;
}