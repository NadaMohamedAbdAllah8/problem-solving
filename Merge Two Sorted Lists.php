<?php
class Solution
{

    /**
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    public function mergeTwoLists($list1, $list2)
    {
        if ($list1 == null) {
            return $list2;
        }

        if ($list2 == null) {
            return $list1;
        }

        if ($list1->val < $list2->val) {
            $list1->next = $this->mergeTwoLists($list1->next, $list2);

            return $list1;
        } else {
            $list2->next = $this->mergeTwoLists($list2->next, $list1);

            return $list2;
        }
    }
}