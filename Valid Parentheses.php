<?php

$solution = new Solution();
echo ' is valid?' . $solution->isValid("{[]}") . ' -----';

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

        $length = strlen($s);

        // the pairs has to be in an even number
        if ($length % 2 != 0) {
            echo 's length is odd';

            return false;
        }

        for ($i = 0; $i < $length - 1; $i += 2) {

            echo '    $s of i=' . $s[$i];
            echo '     $s of i+1=' . $s[$i + 1] . '<br>';

            if ($i + 1 == $length) {
                echo 'i+1==length';
                break;
            }

            if (($s[$i] == $circle_opened && $s[$i + 1] == $circle_closed)) {
                echo ' are  ()';

                continue;

            } elseif (($s[$i] == $square_opened && $s[$i + 1] == $square_closed)) {
                echo ' are []';

                continue;

            } elseif (($s[$i] == $curly_opened && $s[$i + 1] == $curly_closed)) {
                echo ' are {}';

                continue;
            } else {

                echo ' are none  i=' . $i;

                return false;
            }
        }

        return true;

    }
}
