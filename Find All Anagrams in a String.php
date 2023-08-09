<?php

use Solution as GlobalSolution;

$solution=new GlobalSolution();

// var_dump($solution->allCombinations('abc'));

// $s = "cbaebabacd";
// $p = "abc";

$s1 = "abab";
$p1 = "ab";
echo implode(',', $solution->findAnagrams($s1, $p1)) ;

class Solution
{
    /**
     * @param String $s
     * @param String $p
     * @return Integer[]
     */
    public function findAnagrams($s, $p)
    {
        $p_len=strlen($p);
        $s_len=strlen($s);

        if($p_len>$s_len||$s_len==0||$p_len==0) {
            return [];
        }


        $all_combinations=$this->allCombinations($p);
        $result=[];

        for($i=0;$i<$s_len;$i++) {
            $subString=substr($s, $i, $p_len);

            if(array_search($subString, $all_combinations)!==false) {
                $result[]=$i;
            }
        }

        return $result;
    }

    public function allCombinations($str, $prefix = ''): array
    {
        if (strlen($str) == 0) {
            return [$prefix];
        }

        $result = [];
        for ($i = 0; $i < strlen($str); $i++) {
            $char = $str[$i];
            $remaining = substr($str, 0, $i) . substr($str, $i + 1);
            $result = array_merge($result, $this->allCombinations($remaining, $prefix . $char));
        }

        return $result;
    }
}
