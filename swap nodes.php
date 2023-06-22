<?php

class ListNode
{
    public $data = "";
    public $counter = 0;
    public $next = null;

    public function __construct($data, $counter)
    {
        $this->data = $data;
        $this->counter = $counter;
    }

}

class LinkedList
{
    public $head = null;

    public function add($data, $counter)
    {

        if ($this->head == null) {
            $this->head = new ListNode($data, $counter);

        } else {

            $current = $this->head;

            while ($current->next != null) {
                $current = $current->next;
            }

            $current->next = new ListNode($data, $counter);
        }
    }

    // print the datas only
    public function printAsList()
    {
        $nodes_data = [];
        $current = $this->head;

        while ($current != null) {
            array_push($nodes_data, $current->data);
            $current = $current->next;
        }

        $str = '';
        $nodes_data_counter = count($nodes_data);
        for ($i = 0; $i < $nodes_data_counter; $i++) {
            $str .= $nodes_data[$i];
            if ($i != $nodes_data_counter - 1) {
                $str .= ', then ';
            }
        }
        echo  $str;
    }
}

$list=new LinkedList();
buildFromArray($list, [1,2,3,4]);
$list->printAsList();

echo '<br>';

$node1=swapPairs($list->head);

// Print the output: 2 -> 1 -> 4 -> 3
$current = $node1;
while ($current != null) {
    echo $current->data . " -> ";
    $current = $current->next;
}

echo "null";

function buildFromArray(&$list, $array)
{
    $count=count($array);
    //$this->head->data=$array[0];
    for($i=0;$i<$count;$i++) {
        $list->add($array[$i], 0);
    }
}


function swapPairs($node1)
{
    if ($node1==null || $node1->next==null) {
        return $node1;
    }

    // new head
    $node2 = $node1->next;

    // swap the adjacent nodes
    $node1->next = swapPairs($node2->next);
    $node2->next = $node1;

    return $node2;
}
