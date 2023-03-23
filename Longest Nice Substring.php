<?php
class Solution
{

    /**
     * @param String $s
     * @return String
     */
    public function longestNiceSubstring($s)
    {

        $length = strlen($s);

        if ($length < 2) {
            return "";
        }

        for ($i = 0; $i < $length; $i++) {
            // https://www.youtube.com/watch?v=JUvt_9KMDzk
            // split the string in the position of the letter that does not have
            //both upper and lower case letter
            if (!(str_contains($s, strtolower($s[$i])) &&
                str_contains($s, strtoupper($s[$i])))) {
                // s1+un matched letter+s2
                $s1 = $this->longestNiceSubstring(substr($s, 0, $i));
                $s2 = $this->longestNiceSubstring(substr($s, $i + 1, $length));
                if (strlen($s1) > strlen($s2)) {
                    return $s1;
                } else {
                    return $s2;
                }
            }

        }

        return $s;

    }
}