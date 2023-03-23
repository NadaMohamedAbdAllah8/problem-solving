<?php

use Solution as GlobalSolution;

$solution = new GlobalSolution();

echo 'canConstruct?' . $solution->canConstruct('aab', 'baa') . '.';

class Solution
{

    /**
     * @param String $ransomNote
     * @param String $magazine
     * @return Boolean
     */
    public function canConstruct($ransom_note, $magazine)
    {
        $magazine_length = strlen($magazine);
        $ransom_note_length = strlen($ransom_note);

        if ($magazine_length == 0 || $ransom_note_length == 0) {
            // echo 'here';
            return false;
        }

        while (strlen($ransom_note) != 0) {
            // if you found a letter remove it from both strings
            $magazine_pos = strpos($magazine, $ransom_note[0]);

            //echo '$magazine_pos=' . $magazine_pos . '<br>';

            if ($magazine_pos !== false) {

                //echo '$ransom_note[$magazine_pos]=' . $ransom_note[0] . '<br>';

                $magazine = substr_replace($magazine, "", $magazine_pos, 1);
                //echo 'magazine=' . $magazine . '<br>';

                $ransom_note = substr_replace($ransom_note, "", 0, 1);
                //echo 'ransom_note=' . $ransom_note . '<br>';

            } else {
                return false;
            }
        }

        // if ransom note is empty return true
        if (strlen($ransom_note) == 0) {
            return true;
        }

        return false;
    }
}