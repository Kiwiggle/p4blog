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
    $commentManager = new CommentManager();
    $comments = $commentManager->getAllComments();
    require('view/backend/tableComments.php');
}

function reportedComments()
{
    $commentManager = new CommentManager();
    $comments = $commentManager->getReportedComments();
    require('view/backend/tableReportedComments.php');
}

function deleteComment($commentId) 
{
    $commentManager = new CommentManager();
    $commentManager->deleteComment($commentId);
    require('view/backend/admin.php');
}



function adminView() 
{
    require('view/backend/admin.php');
}