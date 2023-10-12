<?php

use Solution as GlobalSolution;

$number_1 = 19;

$solution = new GlobalSolution();

echo 'is ' . $number_1 . ' happy?' . $solution->isHappy($number_1);

class Solution
{
    public function isHappy($n)
    {
        if($n <= 0) {
            return false;
        }

        $str_number = (string) $n;
        $number_sum = $this->digitSum($str_number) ;

        while($number_sum != 1) {
            $number_sum = $this->digitSum((string)$number_sum) ;

            if($number_sum <= 9 && $number_sum != 1) {
                return false;
            }
        }

        return true;
    }

    private function digitSum($str_number)
    {
        $number_sum = 0;
        $str_len = strlen($str_number);

        for($i = 0;$i < $str_len;$i++) {
            $number_sum += (int) $str_number[$i] * (int)$str_number[$i];
        }

        return $number_sum;
    }
}
