<?php $title = 'S\'inscrire'; ?>

<?php ob_start(); ?>

<h1>Inscription</h1>

<form class ="signInForm" action="index.php?action=signin" method="post">
    <label for="name">Nom d'utilisateur :</label>
    <input type="text" id="name" name="name" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>

    <label for="email"  >Email :</label>
    <input type="email" name="email" required>

    <button type="submit" class="submitButton">Valider</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>