<?php

$s = "egg";
$t = "add";

$s_1 = "foo";
$t_1 = "barr";
$solution = new Solution();

echo $solution->isIsomorphic($s_1, $t_1) . '-';

class Solution
{

          public function isIsomorphic(string $s, string $t): bool
          {
                    $s_length = strlen($s);
                    $t_length = strlen($t);

                    if ($s_length != $t_length) {
                              return false;
                    }

                    $s_hash_table = $this->buildHashMap($s);
                    $t_hash_table = $this->buildHashMap($t);

                    $s_hash_table_values = array_values($s_hash_table);
                    $t_hash_table_values = array_values($t_hash_table);

                    if (count($s_hash_table_values) != count($t_hash_table_values)) {
                              return false;
                    }

                    $character_repetition_difference = array_diff(
                              $s_hash_table_values,
                              $t_hash_table_values
                    );

                    print_r($character_repetition_difference);

                    return count($character_repetition_difference) == 0;
          }

          private function buildHashMap($word): array
          {
                    $word_hash_table = [[]];
                    $word_length = strlen($word);

                    for ($i = 0; $i < $word_length; $i++) {
                              if (array_key_exists($word[$i], $word_hash_table)) {
                                        $word_hash_table[$word[$i]] += 1;
                              } else {
                                        $word_hash_table[$word[$i]] = 1;
                              }
                    }

                    return  $word_hash_table;
          }
}
