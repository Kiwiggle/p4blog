<?php

use Model\PostManager;
use Model\CommentManager; 

function tablePosts()
{
    $postManager = new Model\PostManager();
    $posts = $postManager->getPosts();
    require('view/backend/tablePosts.php');
}

function deletePost()
{

}

function modifyPost()
{
    
}

function tableComments() 
{

}

function reportedComments()
{

}



function adminView() 
{
    require('view/backend/admin.php');
}