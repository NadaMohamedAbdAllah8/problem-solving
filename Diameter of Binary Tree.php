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

          private $result=0;
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function diameterOfBinaryTree($root) {
          if($root==null)
          return 0;
          
          $left=$right=0;
       if(!is_null($root->left))
       $left= 1+ $this->diameterOfBinaryTree($root->left);

        if(!is_null($root->right))
       $right= 1+ $this->diameterOfBinaryTree($root->right);

                $left= $this->diameterOfBinaryTree($root->left);
        $right=$this->diameterOfBinaryTree($root->right);

        $this->result=max($right+$left,$this->result);
        
        return max($left,$right);
    }
}