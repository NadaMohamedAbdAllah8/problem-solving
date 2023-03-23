<?php
// [1,2,3,4,5,6,null,8]
// Definition for a binary tree node.
class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;
    public function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution
{

    /*
    @param TreeNode $root
    @return Boolean
     */
    public function isBalanced($root)
    {
        if (is_null($root)) {
            return true;
        }

        $left_height = $this->getTreeHeight($root->left);
        $right_height = $this->getTreeHeight($root->right);

        //         echo '$left_height=' . $left_height;
        //         echo '$right_height=' . $right_height;

        $height_difference = $left_height - $right_height;

        if (abs($height_difference) > 1) {
            return false;
        }

        return true;
    }

    private function getTreeHeight($root)
    {
        if (is_null($root)) {
            return 0;
        }

        //echo '$root->left=' . $root->left->val;
        return max($this->getTreeHeight($root->left) + 1,
            $this->getTreeHeight($root->right) + 1);

    }

    private function getLeftSubTreeHeight($root)
    {
        if (is_null($root)) {
            return 0;
        }

        // echo '$root->left=' . $root->left->val;
        return $this->getLeftSubTreeHeight($root->left) + 1;

    }

    private function getRightSubTreeHeight($root)
    {
        if (is_null($root)) {
            return 0;
        }

        // echo '  $root->right=' . $root->right->val;

        return $this->getRightSubTreeHeight($root->right) + 1;
    }
}