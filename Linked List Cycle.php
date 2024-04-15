<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution
{
    /**
     * @param ListNode $head
     * @return Boolean
     */
    public function hasCycle($head)
    {
        $values = [];


        while (!is_null($head->next)) {
            if (array_search($head->val, $values) !== false) {
                return true;
            } else {
                array_push($values, $head->val);
                $head = $head->next;
            }
        }

        return false;
    }
}