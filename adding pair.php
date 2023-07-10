<?php

$successful_number = 10;
$unsuccessful_number = 18;
$numbers = [1, 2, 5, 6,4, 9];

echo "can find a pair to $successful_number get?". canAddUsingPair($successful_number, $numbers);
echo '<br>';
echo "can find a pair to $unsuccessful_number get?". canAddUsingPair($unsuccessful_number, $numbers);


// the problem is in this video https://www.youtube.com/watch?v=21pmwl0hrME
function canAddUsingPair($target_number, $numbers): bool
{
    $count = count($numbers);
    $compliments = [];

    for ($i = 0; $i < $count; $i++) {
        $compliment = $target_number - $numbers[$i];
        if (array_search($compliment, $compliments)) {
            return true;
        } else {
            array_push($compliments, $numbers[$i]);
        }
    }

    return false;
}
