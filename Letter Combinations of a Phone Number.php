<?php

use Solution as GlobalSolution;

$solution = new GlobalSolution();

echo implode(',', $solution->letterCombinations('234'));

class Solution
{
    private $map;

    public function __construct()
    {
        $this->map[0] = null;
        $this->map[1] = null;
        $this->map[2] = ['a', 'b', 'c'];
        $this->map[3] = ['d', 'e', 'f'];
        $this->map[4] = ['g', 'h', 'i'];
        $this->map[5] = ['j', 'k', 'l'];
        $this->map[6] = ['m', 'n', 'o'];
        $this->map[7] = ['p', 'q', 'r', 's'];
        $this->map[8] = ['t', 'u', 'v'];
        $this->map[9] = ['w', 'x', 'y', 'z'];
    }

    /**
     * @param String $digits
     * @return String[]
     */
    public function letterCombinations($digits)
    {
        $digits_length =  strlen($digits);
        if ($digits_length == 0) {
            return [];
        }

        if ($digits_length == 1) {
            return $this->map[$digits[0]];
        }

        $result = [];
        $this->backtrack(0, "", $digits, $result);

        return $result;
    }

    private function backtrack($i, $letters_to_build, $digits, &$result)
    {
        if ($i >= strlen($digits) || strlen($letters_to_build) == strlen($digits)) {
            $result[] = $letters_to_build;
            return;
        }

        $letters = $this->map[$digits[$i]];

        foreach ($letters as $letter) {
            $this->backtrack($i + 1, $letters_to_build . $letter, $digits, $result);
        }
    }
}