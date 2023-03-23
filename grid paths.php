<?php

echo gridPaths(2, 4);

// the problem description https: //youtu.be/ngCos392W4w?t=383

function gridPaths($n, $m)
{
    if ($n == 1 || $m == 1) {
        return 1;
    }

    return gridPaths($n - 1, $m) + gridPaths($n, $m - 1);
}