<?php

$solution = new Solution();
echo ' is valid?' . $solution->isValid("([}}])") . ' -----';

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    public function isValid($s)
    {
        $circle_opened = '(';
        $square_opened = '[';
        $curly_opened = '{';

        $circle_closed = ')';
        $square_closed = ']';
        $curly_closed = '}';

        $check_stack = [];

        $length = strlen($s);

        // the pairs has to be in an even number
        if ($length % 2 != 0) {
            echo 's length is odd';

            return false;
        }

        echo '$length=' . $length . '<br>';

        $pop_counter = 0;

        for ($i = 0; $i < $length; $i++) {

            echo '<br>s of i=' . $s[$i] . '<br>';

            if ($s[$i] == $circle_opened || $s[$i] == $square_opened
                || $s[$i] == $curly_opened) {
                echo 'pushing opening of ' . $s[$i] . '<br>';

                $number_of_elements_in_array = array_push($check_stack, $s[$i]);

            } elseif ($s[$i] == $circle_closed && count($check_stack) != 0
                && $check_stack[count($check_stack) - 1] == $circle_opened) {
                echo 'to pop ' . $check_stack[count($check_stack) - 1] . '<br>';

                array_pop($check_stack);

                $pop_counter++;

            } elseif ($s[$i] == $square_closed && count($check_stack) != 0
                && $check_stack[count($check_stack) - 1] == $square_opened) {
                echo 'to pop ' . $check_stack[count($check_stack) - 1] . '<br>';

                array_pop($check_stack);

                $pop_counter++;

            } elseif ($s[$i] == $curly_closed && count($check_stack) != 0
                && $check_stack[count($check_stack) - 1] == $curly_opened) {
                echo 'to pop ' . $check_stack[count($check_stack) - 1] . '<br>';

                array_pop($check_stack);

                $pop_counter++;

            }
        }

        return $pop_counter * 2 == $length;

        return (count($check_stack) == 0);
    }
}