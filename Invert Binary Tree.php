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
class Solution
{
    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    public function invertTree($root)
    {
        if(is_null($root)) {
            return null;
        }

        // invert
        $temp=$root->right;
        $root->right=$root->left;
        $root->left=$temp;

        $this->invertTree($root->right);
        $this->invertTree($root->left);

        return $root;
    }
}