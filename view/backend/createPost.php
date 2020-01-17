<?php

$title = 'Créer un nouvel article';
ob_start();
?>

<form action="index.php?action=createPost" method="post">
    <textarea name="textarea" id="textarea" cols="30" rows="10"></textarea>

    <label for="latitude">Veuillez renseigner la latitude :</label>
    <input type="text" id="latitude" name="latitude" required>

    <label for="longitude">Veuillez renseigner la longitude :</label>
    <input type="text" id="longitude" name="longitude" required>
    <button type="submit">Valider l'article</button>
</form>

<?php 
$content = ob_get_clean();
require('view/frontend/template.php');
?>