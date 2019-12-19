<?php 

use Model\PostManager;
use Model\CommentManager; 

function listPosts()
{
    $postManager = new Model\PostManager();
    $posts = $postManager->getPosts();
    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new Model\PostManager();
    $commentManager = new Model\CommentManager();
    $post = $postManager-> getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment) {
    $commentManager = new Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function commentView($commentId) {
    $commentManager = new Model\CommentManager();
    $comment = $commentManager->getComment($commentId);
    require('view/frontend/commentView.php');

}

function modifyComment($oldCommentId, $newComment) {
    $commentManager = new Model\CommentManager();
    $commentManager->modifyComment($oldCommentId, $newComment);
    header('Location: view/frontend/success.php');
}