<?php

use Solution as GlobalSolution;

$input_1=1;

$solution=new GlobalSolution();

echo 'for input='.$input_1.' the number of ways='.$solution->climbStairs($input_1);

class Solution
{
    public function climbStairs($n)
    {
        if($n==1) {
            return 1;
        }

        if($n==2) {
            return 2;
        }

        return $this->fibonacci_using_bottom_up($n-1)+$this->fibonacci_using_bottom_up($n);
    }

    private function fibonacci_using_bottom_up(int $number)
    {
        $bottom_up=array();
        $bottom_up[0]=1;
        $bottom_up[1]=1;
        $bottom_up[2]=1;

        for($i=3;$i<=$number;$i++) {
            $bottom_up[$i]=$bottom_up[$i-1]+$bottom_up[$i-2];
        }

        return $bottom_up[$number];
    }
}