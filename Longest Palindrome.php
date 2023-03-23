<?php

$s = "abccccdd";
$s = "bananas";

$s = "civilwartestingwhetherthatnaptionoranynartionsoconceivedandsodedicatedcanlongendureWeareqmetonagreatbattlefiemldoftzhatwarWehavecometodedicpateaportionofthatfieldasafinalrestingplaceforthosewhoheregavetheirlivesthatthatnationmightliveItisaltogetherfangandproperthatweshoulddothisButinalargersensewecannotdedicatewecannotconsecratewecannothallowthisgroundThebravelmenlivinganddeadwhostruggledherehaveconsecrateditfaraboveourpoorponwertoaddordetractTgheworldadswfilllittlenotlenorlongrememberwhatwesayherebutitcanneverforgetwhattheydidhereItisforusthelivingrathertobededicatedheretotheulnfinishedworkwhichtheywhofoughtherehavethusfarsonoblyadvancedItisratherforustobeherededicatedtothegreattdafskremainingbeforeusthatfromthesehonoreddeadwetakeincreaseddevotiontothatcauseforwhichtheygavethelastpfullmeasureofdevotionthatweherehighlyresolvethatthesedeadshallnothavediedinvainthatthisnationunsderGodshallhaveanewbirthoffreedomandthatgovernmentofthepeoplebythepeopleforthepeopleshallnotperishfromtheearth";

$solution = new Solution();

echo '<br/>' . 'longestPalindrome=' . $solution->longestPalindrome($s) . '<br/>';

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    public function longestPalindrome($s)
    {
        // remove non letters
        $s = preg_replace("/[^a-z|A-Z]/", '', $s);

        $s_to_remove_from = $s;

        // echo 'after removing=' . $s;

        $length = strlen($s_to_remove_from);

        if ($length < 2) {
            return $length;
        }

        $removing_count = 0;

        $longest_length = 0;

        $chars_count = [];
        // count number of each character repetition

        for ($i = 0; $i < $length; $i++) {

            $s_to_remove_from =
                str_replace($s[$i], "", $s_to_remove_from, $removing_count);

            //echo '$s_to_remove_from[0]=' . $s_to_remove_from[0] . '<br>';
            // echo '$removing_count=' . $removing_count . '<br>';

            // char=>how many times it is repeated
            if (!array_key_exists($s[$i], $chars_count)) {
                $chars_count[$s[$i]] = $removing_count;
            }

            //   if ($removing_count % 2 == 0) {
            //       $longest_length += $removing_count;

            //   } else {

            //       if ($length == 1) {
            //           $longest_length += $removing_count;
            //       }

            //       $longest_length += $removing_count - 1;
            //   }

            // echo '  $longest_length=' . $longest_length . '<br>';

            //$length = strlen($s_to_remove_from);
        }

        //   var_dump($chars_count);

        $arr_length = count($chars_count);

        $longest_odd = 0;

        $has_old = 0;

        foreach ($chars_count as $char_count) {
            if ($char_count % 2 == 0) {
                $longest_length += $char_count;

            } else {
                $longest_length += $char_count - 1;

                $has_old = 1;
            }

        }

        return $longest_length + $has_old;
    }
}