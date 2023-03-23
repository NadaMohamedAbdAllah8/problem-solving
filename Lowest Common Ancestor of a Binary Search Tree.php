<?php

// Definition for a binary tree node.
class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;
    public function __construct($value)
    {
        $this->val = $value;
    }
}

class Solution
{
    /**
     * @param TreeNode $root
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    public function lowestCommonAncestor($root, $p, $q)
    {
        // p, or q is the root itself
        if ($root == $p || $root == $q) {
            return $root;
        }

        // p, q are not in the same branch
        if ($root > $p && $root < $q ||
            $root < $p && $root > $q) {
            return $root;
        }

        // p, q are in the same branch {
        if ($root > $p && $root > $q) {
            return $this->lowestCommonAncestor($root->left, $p, $q);
        }

        if ($root < $p && $root < $q) {
            return $this->lowestCommonAncestor($root->right, $p, $q);
        }

    }
}