<?php

$word = 'interview';
$char = 'e';

echo 'Last index=' . lastIndex($word, $char);

function lastIndex($word, $char, $current = 0)
{

          $last_index = null;
          $length = strlen($word);
          if ($length == 0) {
                    return $last_index;
          }

          return  findLastIndex($word, $char, $current, $last_index);
}

function findLastIndex($word, $char, $current, $last_index)
{

          $length = strlen($word);

          if ($current == $length - 1)
                    return $last_index;

          if ($word[$current] == $char) {

                    $last_index = $current;
                    // echo '<br>' . $last_index;
          }

          return  findLastIndex($word, $char, ++$current, $last_index);
}
