<?php

use Solution as GlobalSolution;

$solution = new GlobalSolution();

echo $solution->longestCommonPrefix(["flower", "flow", "flight"]);

class Solution
{

    /**
     * @param String[] $strs
     * @return String
     */
    public function longestCommonPrefix($strs)
    {
        $words_count = count($strs);

        if ($words_count <= 1) {
            return " ";
        }

        $prefix = $strs[0][0];

        // for ($word = 0; $word < $words_count; $word++) {
        foreach ($strs as $word) {
            // flower
            for ($char = 0; $char < strlen($word); $char++) {
                $prefix = $word[$char];

            }
        }

        return " ";

    }
}