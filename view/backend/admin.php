<?php

use Model\PostManager;

$title = 'Espace d\'administration du site';
ob_start();
?>

<h1>Tableau de bord</h1>
<h2>Mes articles</h2>
<?php
    tablePosts(); //Ajout du tableau répertoriant tous les billets
?>
<h2>Tous les commentaires</h2>
<?php
    tableComments(); //Tableau répertoriant les commentaires et billets associés
?>
<h2>Commentaires signalés</h2>

<?php
    reportedComments();

$content = ob_get_clean();
require('view/frontend/template.php');
?>