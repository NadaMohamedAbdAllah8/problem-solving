<?php
// the graph is in page 131 of the Grokking algorithms book
// start
$graph['start']['a'] = 6;
$graph['start']['b'] = 2;
// a
$graph['a']['fin'] = 1;

// b
$graph['b']['a'] = 3;
$graph['b']['fin'] = 5;

$graph['fin'] = [];

function dijkstra($graph)
{

    $infinity = INF;

}