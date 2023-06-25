<?php

// memoization
function fibonacci($number, $memo)
{
    if($memo[$number]!=null) {
        return $memo[$number];
    }

    if($number==1||$number==2) {
        $result= 1;
    } else {
        $result= fibonacci($number-1, $memo)+fibonacci($number-2, $memo);
    }

    $memo[$number]=$result;

    return $result;
}