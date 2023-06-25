<?php
$number=200;

echo fibonacci_using_memoization($number,[null]);
// memoization
function fibonacci_using_memoization($number, $memo)
{
    if(isset($memo[$number])&&$memo[$number]!=null) {
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

echo '<br>';
echo fibonacci_using_bottom_up($number);

// bottom up
function fibonacci_using_bottom_up($number)
{
    $bottom_up=array();
    $bottom_up[0]=1;
    $bottom_up[1]=1;
    $bottom_up[2]=1;

   for($i=3;$i<=$number;$i++)
   {
$bottom_up[$i]=$bottom_up[$i-1]+$bottom_up[$i-2];
   }

    return $bottom_up[$number];
}