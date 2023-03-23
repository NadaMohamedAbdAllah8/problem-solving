<?php

$s = "0P";

$solution = new Solution();

echo 'isPalindrome?' . $solution->isPalindrome($s) . '<br/>';

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    public function isPalindrome($s)
    {

        $s = strtolower($s);

        $s = preg_replace("/[^a-z|0-9]/", '', $s);

        echo 's after removing=' . $s . '<br>';

        $length = strlen($s);

        if ($length == 1) {
            return true;
        }

        $testing_stack = [];

        $half_length = floor($length / 2);

        for ($i = 0; $i < $half_length; $i++) {
            array_push($testing_stack, $s[$i]);
        }

        var_dump($testing_stack);

        echo '<br>$length=' . $length . '<br>';

        echo 'floor($length / 2) - 1=' . (floor($length / 2) - 1) . '<br>';

        for ($i = 0; $i < floor($length / 2); $i++) {
            echo '$testing_stack[$i]=' . $testing_stack[$i] . '<br>';
            echo '$s[$length-1-$i]=' . $s[$length - 1 - $i] . '<br>';

            echo 'new index=' . ($length - 1 - $i) . '<br>';

            if ($testing_stack[$i] != $s[$length - 1 - $i]) {
                return false;
            }
        }

        return true;

    }
}
