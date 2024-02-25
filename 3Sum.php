<?php

$solution = new Solution();
$test_1 = [-1,0,1,2,-1,-4];
$test_2 = [0,1,1];
print_r($solution->threeSum($test_1));
echo'<br>';
print_r($solution->threeSum($test_2));

class Solution
{
    public function threeSum($nums)
    {
        sort($nums);

        $count = count($nums);
        $result = [];

        for($i = 0;$i < $count - 2 ;$i++) {
            if($i > 0 && $nums[$i] == $nums[$i - 1]) {
                continue;
            }

            $left = $i + 1;
            $right = $count - 1;

            while($right > $left) {
                $possible_solution = [$nums[$i] , $nums[$left] , $nums[$right]];
                $sum = array_sum($possible_solution);

                if ($sum === 0) {
                    $result[] = $possible_solution;

                    $left++;
                    $right--;
                } elseif ($sum < 0) {
                    $left++;
                } else {
                    $right--;
                }
            }




            //   for($j = $i + 1;$j < $count;$j++) {
            //       for($k = $i + 1;$k < $count;$k++) {
            //           $possible_solution = [$nums[$i],$nums[$j],$nums[$k]];

            //           if(array_sum($possible_solution) == 0
            //               //  &&$this->arrayIsUnique($solutions, $possible_solution)
            //           ) {
            //               array_push($solutions, $possible_solution);
            //           }
            //       }
            //   }
        }

        return $result;
    }


    //     public function threeSum($nums)
    //     {
    //         $result = [];
    //         $length = count($nums);

    //         if ($length < 3) {
    //             return $result; // Not enough elements to form a triplet
    //         }

    //         sort($nums); // Sort the array in ascending order

    //         for ($i = 0; $i < $length - 2; $i++) {
    //             // Skip duplicate elements
    //             if ($i > 0 && $nums[$i] === $nums[$i - 1]) {
    //                 continue;
    //             }

    //             $left = $i + 1;
    //             $right = $length - 1;

    //             while ($left < $right) {
    //                 $sum = $nums[$i] + $nums[$left] + $nums[$right];

    //                 if ($sum === 0) {
    //                     $result[] = [$nums[$i], $nums[$left], $nums[$right]];

    //                     // Skip duplicate elements
    //                     while ($left < $right && $nums[$left] === $nums[$left + 1]) {
    //                         $left++;
    //                     }
    //                     while ($left < $right && $nums[$right] === $nums[$right - 1]) {
    //                         $right--;
    //                     }

    //                     $left++;
    //                     $right--;
    //                 } elseif ($sum < 0) {
    //                     $left++;
    //                 } else {
    //                     $right--;
    //                 }
    //             }
    //         }

    //         return $result;
    //     }


    private function arrayIsUnique($solutions, $possible_solution)
    {
        foreach ($solutions as $solution) {
            if($this->areArraysEqual($solution, $possible_solution)) {
                return false;
            }
        }

        return true;
    }


    private function areArraysEqual($array1, $array2)
    {
        sort($array1);
        sort($array2);

        return $array1 === $array2;
    }

}
