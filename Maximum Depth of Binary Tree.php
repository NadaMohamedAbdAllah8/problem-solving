<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if(is_null($root)) return 0;

        // 1+ for the root
        $max_right=1+$this->maxDepth($root->right);
        $max_left=1+$this->maxDepth($root->left);

        return max($max_left,$max_right);
    }  
}