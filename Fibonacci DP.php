<?php

// memoization
function fibonacci_using_memoization($number, $memo)
{
    if($memo[$number]!=null) {
        return $memo[$number];
    }

    if($number==1||$number==2) {
        $result= 1;
    } else {
        $result= fibonacci_using_memoization($number-1, $memo)+fibonacci_using_memoization($number-2, $memo);
    }

    $memo[$number]=$result;

    return $result;
}