<?php $title = 'Commentaires';
ob_start();?>

    <h1>Commentaires</h1>

    <article>
        <div class="post">
            <h2> <?php echo htmlspecialchars($post['title']); ?> </h2>
            <p> <?php echo htmlspecialchars($post['content']); ?> </p>
            <p> Posté le : <?php echo $post['creation_date_fr']; ?> </p>
        </div>
    </article>

    <h2>Ajouter un commentaire :</h2>

    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <label for="author"> Auteur </label><br/>
            <input type="text" id="author" name="author"/>
        </div>
        <div>
            <label for="comment"> Commentaire </label><br/>
            <textarea name="comment" id="comment"></textarea>
        </div>
        <div>
            <input type="submit"/>
        </div>
    </form>

    <p>Voici les commentaires :</p>
    
    <?php while ($comment = $comments->fetch()) 
    {
        ?>
        <p><b> <?php echo htmlspecialchars($comment['author']);?> </b> le <?php echo $comment['comment_date_fr']?> (<a href="index.php?action=commentView&amp;commentId=<?= $comment['id']?>">Modifier</a>)</p>
        <p> <?php echo htmlspecialchars($comment['comment']);?> </p>
        <?php
    } 
    $comments->closeCursor();
    ?>

    <a href="index.php"><p>Revenir à l'accueil du site.</p></a>

<?php $content = ob_get_clean(); 
require('template.php') ?>