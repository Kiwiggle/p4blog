<?php

$title = 'Espace d\'administration du blog';
ob_start();
?>

<div class="adminBoard">
    <h1>Administration du blog <br> Tableau de bord</h1>

    <h2>Mes articles</h2>
    <?php
        tablePosts(); //Ajout du tableau répertoriant tous les billets
    ?>
    <button onclick="location.href='index.php?action=createPost'" type="button" class="createPostButton"> Créer un article </button>
    <h2>Tous les commentaires</h2>
    <?php
        tableComments(); //Tableau répertoriant les commentaires et billets associés
    ?>
    <h2>Commentaires signalés</h2>
</div>

<?php
    reportedComments();

$content = ob_get_clean();
require('view/frontend/template.php');
?>