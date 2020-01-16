<?php

use Model\PostManager;
use Model\CommentManager; 

function tablePosts()
{
    $postManager = new Model\PostManager();
    $posts = $postManager->getPosts();
    require('view/backend/tablePosts.php');
}

function createPost($post = null) {
    if ($post === null) {
        require('view/backend/createPost.php');
    } else {
        $postManager = new Model\PostManager();
        $postManager->createPost($post);
        header('Location: index.php');
    }
}

function deletePost($postId)
{
    $postManager = new Model\PostManager();
    $postManager->deletePost($postId);
    header('Location: index.php');
}

function updatePost($updatedPost = null, $updatedPostId = null)
{
    if ($updatedPost === null) {
        require('view/backend/updatePost.php');
    } else {
        $postManager = new Model\PostManager();
        $postManager->updatePost($updatedPost, $updatedPostId);
        header('Location: index.php');
    }
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