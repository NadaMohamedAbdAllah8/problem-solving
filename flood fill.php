<?php
class Solution
{

    public function floodFill($image, int $sr, int $sc, int $color)
    {
        if ($color == $image[$sr][$sc]) {
            return $image;

        }

        try {
            $image[$sr][$sc] = $color;
            $image[$sr + 1][$sc + 1] = $color;

            $image[$sr + 1][$sc] = $color;

            $image[$sr][$sc - 1] = $color;
            $image[$sr - 1][$sc] = $color;

        } catch (Exception $e) {
            //
        }
        return $image;
    }
}
