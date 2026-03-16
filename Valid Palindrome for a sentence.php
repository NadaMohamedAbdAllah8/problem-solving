<?php
$s = "A man, a plan, a canal: Panama";

echo 'isPalindrome?' . isValidPalindrome($s) . '<br/>';

function isValidPalindrome(string $sentence): bool
{
    $sentence = strtolower($sentence);
    $sentence = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $sentence);
    $sentence = str_replace(' ', '', $sentence);
    $length = strlen($sentence);

    $left = 0;
    $right = $length - 1;

    while ($left < $right) {
        if ($sentence[$left] != $sentence[$right]) {
            return false;
        }

        $right--;
    }

    return true;
}

