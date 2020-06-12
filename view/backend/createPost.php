<?php

$title = 'Créer un nouvel article';
ob_start();
?>

<div class="createPost">
    <h1>Créer un nouvel article</h1>

    <form action="index.php?action=createPost" method="post" class="createPostForm">
        <label for="titre">Titre de l'article :</label>
        <input type="text" id="titre" name="titre" required>

        <label for="chapter_id">Numéro de chapitre :</label>
        <input type="text" id="chapter_id" name="chapter_id" required>

        <label for="textarea">Contenu de l'article :</label>
        <textarea name="textarea" id="textarea" cols="30" rows="10"></textarea>

        <label for="latitude">Veuillez renseigner la latitude :</label>
        <input type="text" id="latitude" name="latitude" placeholder="65" required>

        <label for="longitude">Veuillez renseigner la longitude :</label>
        <input type="text" id="longitude" name="longitude" placeholder="-149" required>
        <button type="submit" class="submitButton">Valider l'article</button>
    </form>
</div>


<?php 
$content = ob_get_clean();
require('view/frontend/template.php');
?>