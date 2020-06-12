<?php 
session_start();
require('vendor/autoload.php');

use Controller\CommentController;
use Controller\PostController;
use Controller\UserController;

$postController = new PostController();
$commentController = new CommentController();
$userController = new UserController();

try {
    if (isset($_GET['action'])) {

        if($_GET['action'] === 'listPosts') {
            $postController->listPosts();
        }

        elseif($_GET['action'] === 'post') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                $postController->post($_GET['id']);
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }

        elseif($_GET['action'] === 'addComment') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $commentController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Erreur : tous les champs ne sont pas remplis');
                }
            } else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }

        elseif($_GET['action'] === 'commentView') {
            if(isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                $commentController->commentView($_GET['commentId']);
            } else {
                throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
            }
        } 
        
        elseif ($_GET['action'] === 'reportComment' && (isset($_GET['commentId']))) {
            $commentController->reportComment($_GET['commentId']);
        } 
        
        elseif ($_GET['action'] === 'signin') {
            if($_POST) {
                $userController->signIn($_POST);
            } else {
                $userController->signIn();
            }
        } 
        
        elseif ($_GET['action'] === 'login') {
            if($_SESSION['name'] == null) {
                if($_POST) {
                    $userController->logIn($_POST);
                } else {
                    $userController->logIn();
                }
            } else {
                header('Location: index.php');
            }
        } 
        
        elseif ($_GET['action'] === 'logout') {
            $userController->logout();
        } 
        
        elseif ($_GET['action'] === 'admin') {
            if(isset($_SESSION) && $_SESSION['role'] === 'admin') {
                require('view/backend/admin.php');
            } else {
                $userController->logIn();
            }
        } 
        
        elseif ($_GET['action'] === 'createPost') {
            if(isset($_SESSION) && $_SESSION['role'] === 'admin') {
                if ($_POST) {
                    $postController->createPost($_POST);
                } else {
                    $postController->createPost();
                }
            } 
        } 
        
        elseif ($_GET['action'] === 'updatePost' && $_GET['id']) {
            if(isset($_SESSION) && $_SESSION['role'] === 'admin') {
                if ($_POST) {
                    $postController->updatePost($_GET['id'], $_POST);
                } else {
                    $postController->updatePost($_GET['id']);
                }
            }
        } 
        
        elseif ($_GET['action'] === 'deletePost' && $_GET['id']) {
            if(isset($_SESSION) && $_SESSION['role'] === 'admin') {
                $postController->deletePost($_GET['id']);
            }
        } 
        
        elseif ($_GET['action'] === 'deleteComment' && (isset($_GET['id']))) {
            if(isset($_SESSION) && $_SESSION['role'] === 'admin') {
                $commentController->deleteComment($_GET['id']);
            }
        } 

        elseif ($_GET['action'] === 'verifyComment' && (isset($_GET['id']))) {
            if(isset($_SESSION) && $_SESSION['role'] === 'admin') {
                $commentController->commentVerified($_GET['id']);
            }
        } 
        
        else {
            throw new Exception("L'URL n'est pas bonne");
        }

    } else {
        $postController->listPosts();
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    require('view/error/error.php');
}
