<?php 
session_start();
require('vendor/autoload.php');
require('controller/frontend.php');
require('controller/backend.php');

try {
    if (isset($_GET['action'])) {
        if($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif($_GET['action'] == 'post') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }
        elseif($_GET['action'] == 'addComment') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Erreur : tous les champs ne sont pas remplis');
                }
            } else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
    
        }
        elseif($_GET['action'] == 'commentView') {
            if(isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                commentView($_GET['commentId']);
            } else {
                throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
            }
        } elseif ($_GET['action'] == 'modifyComment') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    modifyComment($_GET['id'], $_POST['comment']);
                } else {
                    throw new Exception('Erreur : le commentaire n\'a pu être modifié');
                }
            }
        } elseif ($_GET['action'] == 'reportComment' && (isset($_GET['commentId']))) {
            reportComment($_GET['commentId']);
        } elseif ($_GET['action'] == 'signin') {
            if($_POST) {
                signIn($_POST);
            } else {
                signIn();
            }
        } elseif ($_GET['action'] == 'login') {
            if(!$_SESSION) {
                if($_POST) {
                    logIn($_POST);
                } else {
                    logIn();
                }
            } else {
                header('Location: index.php');
            }
        } elseif ($_GET['action'] == 'logout') {
            logout();
        } elseif ($_GET['action'] == 'admin') {
            if(isset($_SESSION) && $_SESSION['name'] === 'Forteroche') {
                adminView();
            } else {
                logIn();
            }
        } elseif ($_GET['action'] == 'createPost') {
            if(isset($_SESSION) && $_SESSION['name'] === 'Forteroche') {
                if ($_POST) {
                    createPost($_POST);
                } else {
                    createPost();
                }
            } 
        } elseif ($_GET['action'] == 'updatePost') {
            if(isset($_SESSION) && $_SESSION['name'] === 'Forteroche') {
                if ($_POST) {
                    updatePost($_GET['id'], $_POST);
                } else {
                    updatePost($_GET['id']);
                }
            }
        } elseif ($_GET['action'] == 'deletePost' && $_GET['id']) {
            if(isset($_SESSION) && $_SESSION['name'] === 'Forteroche') {
                deletePost($_GET['id']);
            }
        } elseif ($_GET['action'] == 'deleteComment' && (isset($_GET['id']))) {
            if(isset($_SESSION) && $_SESSION['name'] === 'Forteroche') {
                deleteComment($_GET['id']);
            }
        } 
    } else {
        listPosts();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}





