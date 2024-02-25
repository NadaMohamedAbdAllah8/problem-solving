<?php

$s = "abccccdd";
$s = "bananas";

$s = "civilwartestingwhetherthatnaptionoranynartionsoconceivedandsodedicatedcanlongendureWeareqmetonagreatbattlefiemldoftzhatwarWehavecometodedicpateaportionofthatfieldasafinalrestingplaceforthosewhoheregavetheirlivesthatthatnationmightliveItisaltogetherfangandproperthatweshoulddothisButinalargersensewecannotdedicatewecannotconsecratewecannothallowthisgroundThebravelmenlivinganddeadwhostruggledherehaveconsecrateditfaraboveourpoorponwertoaddordetractTgheworldadswfilllittlenotlenorlongrememberwhatwesayherebutitcanneverforgetwhattheydidhereItisforusthelivingrathertobededicatedheretotheulnfinishedworkwhichtheywhofoughtherehavethusfarsonoblyadvancedItisratherforustobeherededicatedtothegreattdafskremainingbeforeusthatfromthesehonoreddeadwetakeincreaseddevotiontothatcauseforwhichtheygavethelastpfullmeasureofdevotionthatweherehighlyresolvethatthesedeadshallnothavediedinvainthatthisnationunsderGodshallhaveanewbirthoffreedomandthatgovernmentofthepeoplebythepeopleforthepeopleshallnotperishfromtheearth";
$s2 = "babad";
$s3 = "cbbd";
$solution = new Solution();

$longes_palindrome = $solution->longestPalindrome($s) ;
echo '<br/>' . 'longestPalindrome=' . $longes_palindrome . ', its length=' . strlen($longes_palindrome) . '<br/>';

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function longestPalindrome($s): string
    {
        if(strlen($s) <= 1) {
            return $s;
        }

        $str_len = strlen($s);
        $max_palindrome_length = 0;
        $palindrome_start = 0;
        $palindrome_end = 0;

        for($i = 0;$i < $str_len;$i++) {
            $regular_case = $this->expandFromMiddle($s, $i, $i + 1);
            // like racecar, e does not ahve a match, but the word is still a palindrome
            $odd_case = $this->expandFromMiddle($s, $i, $i);

            $max_palindrome_length = max($regular_case, $odd_case);

            // this includes comparing current max with the old max
            if($max_palindrome_length > ($palindrome_end - $palindrome_start)) {
                $palindrome_start = ceil($i - ($max_palindrome_length - 1) / 2) ;
                $palindrome_end = $i + $max_palindrome_length / 2;
            }
        }

        return substr($s, $palindrome_start, $palindrome_end);
    }

    private function expandFromMiddle(string $str, int $left, int $right): int
    {
        if($right < $left) {
            return 0;
        }

        while($left >= 0 && $right < strlen($str) && $str[$right] == $str[$left]) {
            $left--;
            $right++;
        }

        return $right - $left - 1;
    }
}