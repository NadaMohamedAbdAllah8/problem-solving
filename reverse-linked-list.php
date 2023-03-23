<?php

// Definition for a singly-linked list.
class ListNode
{
    public $val = 0;
    public $next = null;
    public function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    public function reverseList($head)
    {

        $previous = null;

        while ($head != null) {
            $next_node = $head->next;

            $head->next = $previous;

            $previous = $head;

            $head = $next_node;
        }

        return $previous;
    }
}