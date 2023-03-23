<?php
/* The isBadVersion API is defined in the parent class VersionControl.
public function isBadVersion($version){} */

class Solution extends VersionControl
{
    /**
     * @param Integer $n
     * @return Integer
     */
    public function firstBadVersion($n)
    {
        if ($n == 1) {
            return $n;
        }

        $left = 1;

        $right = $n;

        while ($left != $right) {

            $mid = floor(($left + $right) / 2);

            if ($this->isBadVersion($mid)) {

                $right = $mid;

            } else {
                $left = $mid + 1;

            }
        }

        return $right;

    }
}