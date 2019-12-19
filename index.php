<?php 
require('vendor/autoload.php');
require('controller/frontend.php');

use Model\PostManager;

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
                throw new Exeption('Erreur : aucun identifiant de billet envoyé');
            }
        }
        elseif($_GET['action'] == 'addComment') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exeption('Erreur : tous les champs ne sont pas remplis');
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
                    throw new Exeption('Erreur : le commentaire n\'a pu être modifié');
                }
                
            }
        }
    } else {
        listPosts();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}





