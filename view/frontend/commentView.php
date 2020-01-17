<?php $title = 'Modifier un commentaire'; 

ob_start(); ?>

<h1>Modifier un commentaire</h1>

<h2>Rappel du commentaire à modifier :</h2>

<div class="billet">
    <p><b><?= $comment['author']?></b> le <?= $comment['comment_date_fr']?></p>
    <p><?= $comment['comment']?></p>
</div>

<h2>Modifier le commentaire : </h2>

<form action="index.php?action=modifyComment&amp;id=<?=$comment['id']?>" method="post">
    <label for="comment">Veuillez renseigner votre modification :</label><br/>
    <textarea name="comment" id="comment" cols="30" rows="10"></textarea><br/>
    <input type="submit"/>
</form>

<?php $content = ob_get_clean();

require('template.php');