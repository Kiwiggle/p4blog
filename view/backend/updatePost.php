<?php

$title = 'Modifier un article';
ob_start();
?>

<form action="index.php?action=updatePost&amp;id=<?= $_GET['id'] ?>" method="post">
    <textarea name="textarea" id="textarea" cols="30" rows="10"></textarea>
    <button type="submit">Modifier l'article</button>
</form>

<?php 
$content = ob_get_clean();
require('view/frontend/template.php');
?>