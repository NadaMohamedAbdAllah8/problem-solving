<?php

use Solution as GlobalSolution;

$s = "aacc";
$t = "ccac";

$solution = new GlobalSolution();

echo 'anagram? ' . $solution->isAnagram($s, $t) . '+++';

class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    public function isAnagram($s, $t)
    {

        $s_length = strlen($s);

        $t_length = strlen($t);

        if ($s_length != $t_length) {
            return false;
        }

        for ($i = 0; $i < $s_length; $i++) {

            $position_in_t = strpos($t, $s[$i]);

            if ($position_in_t !== false) {
                // remove the character from the 2 strings

                $t = str_replace($s[$i], "", $t, $t_removing_count);

                $s = str_replace($s[$i], "", $s, $s_removing_count);

                if ($s_removing_count != $t_removing_count) {
                    return false;
                }

            } else {
                return false;
            }
        }

        return true;
    }
}
