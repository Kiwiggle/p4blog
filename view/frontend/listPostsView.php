<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>

<p>Derniers billets du blog :</p>

<article>
    <?php 
    while ($donnees = $posts->fetch()) 
    {
    ?>

        <div class="post">
            <h2> <?= htmlspecialchars($donnees['title']); ?> </h2>
            <p> <?= $donnees['content']; ?> </p>
            <p> Article posté le : <?= $donnees['date_creation_fr']; ?> </p>
            <a href="index.php?action=post&amp;id=<?= $donnees['id']?>"><p>Commentaires</p></a>
        </div>
        
    <?php
    }    
    $posts->closeCursor();
    ?>
</article>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>