<?php

use Controller\CommentController;
use Controller\PostController;

$title = 'Espace d\'administration du blog';

$commentsController = new CommentController();
$postController = new PostController();

ob_start();
?>

<div class="adminBoard">
    <h1>Administration du blog <br> Tableau de bord</h1>

    <h2>Mes articles</h2>
    <?php
        $postController->tablePosts(); //Ajout du tableau répertoriant tous les billets
    ?>
    <button onclick="location.href='index.php?action=createPost'" type="button" class="createPostButton"> Créer un article </button>
    <h2>Tous les commentaires</h2>
    <?php
        $commentsController->tableComments(); //Tableau répertoriant les commentaires et billets associés
    ?>
    <h2>Commentaires signalés</h2>
</div>

<?php
    $commentsController->reportedComments(); //Tableau répertoriant tous les commentaires signalés

$content = ob_get_clean();
require('view/frontend/template.php');
?>