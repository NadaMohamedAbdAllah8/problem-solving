<?php

class Solution
{
    /**
     * @param TreeNode $root
     * @return String[]
     */
    public function binaryTreePaths($root)
    {
        $leaves =[];
        $path='';
        $this->getPath($root, $leaves, $path);
        return $leaves;
    }


    private function getPath($root, &$leaves, $path)
    {

        if(is_null($root)) {
            return;
        }

        if($path == "") {
            $path= $path . $root->val;
        } // 1
        else {
            $path.=  "->" . $root->val;
        } // 1 -> 2

        if(is_null($root->left)&&is_null($root->right)) {
            return array_push($leaves, $path);
        }


        $this->getPath($root->left, $leaves, $path);

        $this->getPath($root->right, $leaves, $path);

    }
}