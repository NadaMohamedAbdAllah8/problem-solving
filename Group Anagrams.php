<?php
$strs1 = ["eat", "tea", "tan", "ate", "nat", "bat"];

$solution = new Solution();

var_dump($solution->groupAnagrams($strs1));

class Solution
{
          function groupAnagrams($strs)
          {
                    $anagrams = array();

                    foreach ($strs as $word) {
                              $total_ascii = 0;

                              for ($i = 0; $i < strlen($word); $i++) {

                                        $total_ascii += ord($word[$i]);
                              }

                              if (array_key_exists($total_ascii, $anagrams)) {
                                        // var_dump($anagrams[$total_ascii]);

                                        $anagrams[$total_ascii] = array_merge($anagrams[$total_ascii], [$word]);
                              } else {
                                        $anagrams[$total_ascii] = [$word];
                              }
                    }

                    return array_values($anagrams);
          }
}
