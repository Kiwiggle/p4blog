<?php

use Model\PostManager;
use Model\CommentManager; 
use Model\UserManager;

function tablePosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    require('view/backend/tablePosts.php');
}

function createPost($post = null) {
    if ($post === null) {
        require('view/backend/createPost.php');
    } else {
        $postManager = new PostManager();
        $postManager->createPost($post);
        header('Location: index.php');
    }
}

function deletePost($postId)
{
    $postManager = new PostManager();
    $postManager->deletePost($postId);
    header('Location: index.php');
}

function updatePost($postId, $updatedPost = null)
{
    if ($updatedPost === null) {
        $postManager = new PostManager();
        $post = $postManager->getPost($postId);
        require('view/backend/updatePost.php');
    } else {
        $postManager = new PostManager();
        $postManager->updatePost($updatedPost, $postId);
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

function adminView() {
    require('view/backend/admin.php');
}

function signIn($user = null) {
    if ($user === null) {
        require('view/frontend/signin.php');
    } else {
        $userManager = new UserManager();
        $userManager->newUser($_POST);
        header('Location: index.php');
    }
    
}

function logIn($user = null) {
    if ($user === null) {
        require('view/frontend/login.php');
    } else {
        $userManager = new UserManager();
        $password = $userManager->logInUser($_POST);
            if ($password === true) {
                session_start();
                $_SESSION['name'] = $user['name'];
                header('Location: index.php');
            } else {
                echo "Mauvais identifiant ou mot de passe !";
            }
    }
    
}

function logout() {
    session_destroy();
    header('Location: index.php');
}
