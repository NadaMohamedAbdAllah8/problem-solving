<?php

// $graph["you"] = ["alice", "bob", "claire"];
// $graph["bob"] = ["anuj", "peggy"];
// $graph["alice"] = ["peggy"];
// $graph["claire"] = ["thom", "jonny"];
// $graph["anuj"] = [];
// $graph["peggy"] = [];
// $graph["thom"] = [];
// $graph["jonny"] = ['nada'];

$graph['A'] = ['B', 'C', 'D'];
$graph['B'] = ['A', 'C', 'D'];
$graph['C'] = ['B'];
$graph['D'] = ['A', 'C', 'B'];

$value = 'nada';

$in_graph = 'No';

if (breadthFirstSearch($graph, $value)) {
    $in_graph = 'Yes';
}

echo 'Is ' . $value . ' in the graph? ' . $in_graph;

function breadthFirstSearch($graph, $value)
{
    if (count($graph) == 0) {
        return false;
    }

    $search_queue = new \Ds\Queue();

    // var_dump($node);

    // enqueue the node neighbors
    // echo '$graph[array_key_first($graph)]=' . $graph[array_key_first($graph)];

    foreach ($graph[array_key_first($graph)] as $nodes) {
        $search_queue->push($nodes);
    }

    // echo '<br>';
    // var_dump($search_queue);
    // echo '<br>-------------<br>';

    $added_nodes = [];

    while (!$search_queue->isEmpty()) {
        $peek_value = $search_queue->pop();

        echo '***************** $peek_value =' . $peek_value . ' ***********<br>';

        if ($peek_value == $value) {
            return true;
        }

        // array_push($added_nodes, $peek_value);

        // echo 'added_nodes= ';
        // var_dump($added_nodes);
        // echo '<br>';

        // enqueue the node that got dequeued neighbors
        foreach ($graph[$peek_value] as $node) {
            // echo 'node=' . $node . ' node is added_nodes?';
            // echo array_search($node, $added_nodes) !== true;
            // echo '<br>';

            // echo '$node=' . $node . ' added?';
            $added = array_search($node, $added_nodes, true);
            // var_dump($added);
            // echo '<br>';
            if ($added === false) {
                // echo 'pushing to the queue';

                $search_queue->push($node);
                array_push($added_nodes, $node);

            }

        }

        // echo '<br>';
        // var_dump($search_queue);
        // echo '<br>-------------<br>';

    }

    // echo '<br>-------------<br>';

    return false;
}
