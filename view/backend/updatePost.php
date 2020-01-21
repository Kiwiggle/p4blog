<?php

$title = 'Modifier un article';
ob_start();
?>

<div class="createPost">
    <h1>Modifier un article</h1>
  
    <form action="index.php?action=updatePost&amp;id=<?= $_GET['id'] ?>" method="post" class="createPostForm">
        <label for="titre">Titre de l'article :</label>
        <input type="text" id="title" name="titre" value="<?= $post['title'] ?>" required>

        <label for="textarea">Contenu de l'article :</label>
        <textarea name="textarea" id="textarea" cols="30" rows="10"> <?php echo $post['content']?> </textarea>

        <label for="latitude">Veuillez renseigner la latitude :</label>
        <input type="text" id="latitude" name="latitude" value="<?= $post['latitude'] ?>" required>

        <label for="longitude">Veuillez renseigner la longitude :</label>
        <input type="text" id="longitude" name="longitude" value="<?= $post['longitude'] ?>"required>
        <button type="submit" class="submitButton">Modifier  l'article</button>
    </form>
</div>


<?php 
$content = ob_get_clean();
require('view/frontend/template.php');
?>