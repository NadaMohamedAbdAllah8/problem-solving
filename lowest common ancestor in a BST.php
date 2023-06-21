<?php

$binary_search_tree_array = [6, 2, 8, 0, 4, 7, 9, null, null, 3, 5];
$root = new TreeNode(6);
$p = new TreeNode(2);
$q = new TreeNode(8);
$bst = new BinarySearchTree();
$root=$bst->buildTreeFromArray($binary_search_tree_array);
$lowest_common_ancestor = $bst->lowestCommonAncestor($root, $p, $q);
echo $lowest_common_ancestor->val;
//--------------------Another tree------------------------
echo '<hr>';
$binary_search_tree_array_2 = [2,1];
$root_2 = new TreeNode(6);
$p = new TreeNode(2);
$q = new TreeNode(1);
$bst = new BinarySearchTree();
$root_2=$bst->buildTreeFromArray($binary_search_tree_array_2);
$lowest_common_ancestor = $bst->lowestCommonAncestor($root_2, $p, $q);
echo $lowest_common_ancestor->val;

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

class BinarySearchTree
{
    public function buildTreeFromArray($array)
    {
        return $this->buildTreeHelper($array, 0);
    }

    private function buildTreeHelper($array, $index)
    {
        if ($index >= count($array) || $array[$index] === null) {
            return null;
        }

        $node = new TreeNode($array[$index]);
        $node->left = $this->buildTreeHelper($array, 2 * $index + 1);
        $node->right = $this->buildTreeHelper($array, 2 * $index + 2);

        return $node;
    }

    public function lowestCommonAncestor(TreeNode $root, TreeNode $p, TreeNode $q): TreeNode
    {
        // go left
        if ($root->val > $p->val && $root->val > $q->val) {
            return  $this->lowestCommonAncestor($root->left, $p, $q);
        }

        // go right
        if ($root->val < $p->val  && $root->val < $q->val) {
            return  $this->lowestCommonAncestor($root->right, $p, $q);
        }

        return $root;
    }
}
