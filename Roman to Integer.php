<?php

use Solution as GlobalSolution;

$s1 = 'MCMXCIV';
$s2 = 'LVIII';

$solution = new GlobalSolution();

echo $solution->romanToInt($s1).'<br>'.$solution->romanToInt($s2);

class Solution
{
    /**
    * @param String $s
    * @return Integer
    */
    public function romanToInt($s)
    {
        $symbol_value['I'] = 1;
        $symbol_value['V'] = 5;
        $symbol_value['X'] = 10;
        $symbol_value['L'] = 50;
        $symbol_value['C'] = 100;
        $symbol_value['D'] = 500;
        $symbol_value['M'] = 1000;

        $s = strtoupper($s);

        $result = 0;
        $length = strlen($s);

        for($i = 0;$i < $length;$i++) {
            if($i + 1 < $length && $symbol_value[$s[$i]] < $symbol_value[$s[$i + 1]]) {
                $result += $symbol_value[$s[$i+1]] - $symbol_value[$s[$i ]];
                $i++;
            } else {
                $result += $symbol_value[$s[$i]];
            }
        }
        return $result;
    }
}