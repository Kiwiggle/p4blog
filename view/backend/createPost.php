<?php

$title = 'Créer un nouvel article';
ob_start();
?>

<form action="index.php?action=createPost" method="post">
    <textarea name="textarea" id="textarea" cols="30" rows="10"></textarea>
    <button type="submit">Valider l'article</button>
</form>

<?php 
$content = ob_get_clean();
require('view/frontend/template.php');
?>