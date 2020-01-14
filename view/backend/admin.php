<?php

use Model\PostManager;

$title = 'Espace d\'administration du site';
ob_start();

tablePosts(); //Ajout du tableau répertoriant tous les billets

$content = ob_get_clean();
require('view/frontend/template.php');
?>