<?php

// echo (7 ^ 9);

// Driver Code
$a = "1";
$b = "11";
// echo ord('0');
echo addBinary($a, $b);

function addBinary($a, $b)
{
    $result = ""; // Initialize result
    $s = 0;     // Initialize digit sum

    // Traverse both strings starting
    // from last characters
    $i = strlen($a) - 1;
    $j = strlen($b) - 1;
    while ($i >= 0 || $j >= 0 || $s == 1) {

        // Comput sum of last digits and carry
        $s += ord($a[$i]) - ord('0');
        $s += ord($b[$j]) - ord('0');


        // If current digit sum is 1 or 3,
        // add 1 to result
        $result = chr($s % 2 + ord('0')) . $result;

        // Compute carry
        $s = (int)($s / 2);

        // Move to next digits
        $i--;
        $j--;
    }
    return $result;
}

// function addBinary2($a, $b)
// {
//     $result = ""; // Initialize result
//     $s = 0;     // Initialize digit sum

//     // Traverse both strings starting
//     // from last characters
//     $i = 0;
//     $j = 0;
//     $max_a = strlen($a) - 1;
//     $max_b = strlen($b) - 1;

//     while ($i <= $max_a || $j <= $max_b || $s == 1) {
//         // Comput sum of last digits and carry
//         $sum_temp = $a[$i] + $b[$j];

//         if ($sum_temp == 2)

//             echo 'sum temp=' . $sum_temp;
//         // If current digit sum is 1 or 3,
//         // add 1 to result
//         $result = chr($s % 2 + ord('0')) . $result;

//         // Compute carry
//         $s = (int)($s / 2);

//         // Move to next digits
//         $i++;
//         $j++;
//     }
//     return $result;
// }