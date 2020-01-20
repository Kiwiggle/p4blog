<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<header id="index_header">
    <h1>Un billet simple pour l'Alaska.</h1>
    

    <p>
        "Un billet simple pour l'Alaska" est un roman que j'ai choisi de dévoiler petit à petit sur ce blog. Vous retrouverez chacun des chapitres sur la carte, cliquez sur un marqueur pour lire le chapitre de votre choix. <br>
        Je vous souhaite, à toutes et tous, une agréable lecture. <br>
        <b class="author"> Jean Forteroche </b>
    </p>
    <a href="index.php?action=admin"> <p>Espace Admin</p> </a>
</header>

<nav class="loginNav">
    <a href="index.php?action=login"> <p>Se connecter</p> </a>
    <a href="index.php?action=signIn"> <p>S'inscrire</p> </a>
</nav>

<div id="mapid"></div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>