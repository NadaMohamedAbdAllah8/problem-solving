<?php
use Solution as GlobalSolution;

$s1 = 'Hello World';
$s2 = '   fly me   to   the moon  ';

$solution = new GlobalSolution();

echo $solution->lengthOfLastWord($s1).'<br>'.$solution->lengthOfLastWord($s2);
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s) {
        $s=trim($s);
        $s_array=explode(' ',$s);
        return strlen($s_array[count( $s_array)-1]);
    }
}