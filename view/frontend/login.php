<?php $title = 'Se connecter'; ?>

<?php ob_start(); ?>

<h1>Se connecter</h1>

<form class ="signInForm" action="index.php?action=login" method="post">
    <label for="name">Nom d'utilisateur :</label>
    <input type="text" id="name" name="name" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>

    <button type="submit" class="submitButton">Valider</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>