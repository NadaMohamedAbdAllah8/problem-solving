<?php

$binary_search_tree_array = [1,2,3,4,5];
$bst = new BinarySearchTree();
$root=$bst->buildTreeFromArray($binary_search_tree_array);
echo 'In order<br>';
$dfs = $bst->inOrderTraversal($root);
echo '<hr>';

echo 'Pre order<br>';
$dfs = $bst->preOrderTraversal($root);
echo '<hr>';

echo 'Post order<br>';
$dfs = $bst->postOrderTraversal($root);
echo '<hr>';

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


    public function inOrderTraversal(TreeNode $root)
    {
        if(is_null($root)) {
            return;
        }


        if(!is_null($root->left)) {
            $this->inOrderTraversal($root->left);
        }

                echo $root->val.' ';

                
        if(!is_null($root->right)) {
            $this->inOrderTraversal($root->right);
        }
    }


    public function preOrderTraversal(TreeNode $root)
    {
        if(is_null($root)) {
            return;
        }

        echo $root->val.' ';

        if(!is_null($root->left)) {
            $this->preOrderTraversal($root->left);
        }

        if(!is_null($root->right)) {
            $this->preOrderTraversal($root->right);
        }

    }

    public function postOrderTraversal(TreeNode $root)
    {
        if(is_null($root)) {
            return;
        }

        if(!is_null($root->left)) {
            $this->postOrderTraversal($root->left);
        }

        if(!is_null($root->right)) {
            $this->postOrderTraversal($root->right);
        }

        echo $root->val.' ';
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
}