<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<header id="index_header">
    <h1>Un billet simple pour l'Alaska.</h1>
    <p id="author">Jean Forteroche. </p>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus cum quam repellendus dicta perferendis ex esse, harum distinctio necessitatibus. Dolorum repellat in rem enim harum porro ducimus itaque, nesciunt excepturi.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur non illo accusantium earum consequatur quas impedit similique ipsa inventore quisquam mollitia corrupti sapiente voluptates nam, consequuntur harum reprehenderit unde iure.</p>

    <a href="index.php?action=admin"> <p>Espace Admin</p> </a>
</header>

<div id="mapid"></div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>