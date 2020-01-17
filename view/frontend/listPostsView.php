<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<header>
    <h1>Un billet simple pour l'Alaska.</h1>
    <p>De Jean Forteroche</p>
</header>

<div id="mapid"></div>

<!--<p>Derniers billets du blog :</p>

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

<a href="index.php?action=admin"><p>Espace Admin</p></a>-->

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>