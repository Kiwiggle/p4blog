<?php $title = 'Opération réussie';

ob_start();?>

<p>Le commentaire a bien été modifié !</p>

<a href="../../index.php"><p>Revenir à l'accueil du site</p></a>

<?php $content = ob_get_clean();
require('template.php');?>