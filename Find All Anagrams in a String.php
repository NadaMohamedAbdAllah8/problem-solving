<?php

use Solution as GlobalSolution;

$solution = new GlobalSolution();

// var_dump($solution->allCombinations('abc'));

// $s = "cbaebabacd";
// $p = "abc";

$s1 = "abab";
$p1 = "ab";
echo implode(',', $solution->findAnagrams($s1, $p1));

class Solution
{
    /**
     * @param String $s
     * @param String $p
     * @return Integer[]
     */
    public function findAnagrams($s, $p)
    {
        $p_len = strlen($p);
        $s_len = strlen($s);

        if ($p_len > $s_len || $s_len == 0 || $p_len == 0) {
            return [];
        }

        $p_map = [];
        for ($i = 0; $i < $p_len; $i++) {
            $char = $p[$i];
            if (!isset($p_map[$char])) {
                $p_map[$char] = 0;
            }
            $p_map[$char]++;
        }

        print_r($p_map);

        //         $all_combinations=$this->allCombinations($p);
        $result = [];

        //         for($i=0;$i<$s_len;$i++) {
        //             $subString=substr($s, $i, $p_len);

        //             if(array_search($subString, $all_combinations)!==false) {
        //                 $result[]=$i;
        //             }
        //         }

        return $result;
    }
}
