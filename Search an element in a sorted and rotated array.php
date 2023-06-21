<?php

$nums_7_elements = [4, 5, 6, 7, 0, 1, 2];
$nums_5_elements = [5, 1, 2, 3, 4];
$nums_4_elements = [11, 13, 15, 17];
$nums_3_elements = [1, 2, 3];
$nums_2_elements = [2, 1];
$found= searchNum($nums_5_elements, 3);

if($found===true) {
    echo 'found';
} else {
    echo'not found';
}
echo '<br> search is done';

function searchNum($array, $number)
{
    $count=count($array);

    if($count==0) {
        return false;
    }

    if($count==1&&$array[0]==$number) {
        return true;
    }

    return findNumber($array, $number, $count-1);
}

function findNumber($nums, $number, $right, $left = 0)
{
    if($right==$left&&$nums[$right]!=$number) {
        return false;
    }


    if ($right < $left) {
        return false;
    }

    $mid = floor($left + ($right - $left) / 2);

    //     echo '  $mid='.  $mid.' ';
    if($nums[$mid]==$number) {
        return true;
    }

    // which part to discard
    // left
    if($mid>0&&$nums[$mid]>=$nums[$mid-1]) {
        return findNumber($nums, $number, $right, $mid+1);
    } else {
        // right
        return findNumber($nums, $number, $mid-1);
    }
}
