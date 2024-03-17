<?php
$strs1 = ["eat", "tea", "tan", "ate", "nat", "bat"];

$solution = new Solution();

var_dump($solution->groupAnagramsByCountingCharacters($strs1));

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

          function groupAnagramsByCountingCharacters($strs)
          {
                    $anagrams = [];

                    foreach ($strs as $word) {
                              // Create an array to count occurrences of each character
                              // Initialize it with 26 zeros for each letter of the alphabet
                              $count = array_fill(0, 26, 0);

                              // Count each character in the word
                              for ($i = 0; $i < strlen($word); $i++) {
                                        $char_pos = ord($word[$i]) - ord('a'); // Calculate position in the alphabet
                                        $count[$char_pos]++;
                              }

                              // Create a unique string (signature) from the counts
                              $signature = implode('#', $count);

                              // Group by the signature
                              $anagrams[$signature][] = $word;
                    }

                    return array_values($anagrams);
          }
}