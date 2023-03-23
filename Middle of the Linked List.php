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
    public function middleNode($head)
    {
        if ($head == null) {
            return null;
        }

        if ($head->next == null) {
            return $head;
        }

        $slow = $head;

        $fast = $head;

        while ($fast && $fast->next) {
            if ($fast->next == null) {
                return $slow;
            }

            $slow = $slow->next;

            $fast_next = $fast->next;

            $fast = $fast_next->next;
        }

        return $slow;
    }
}