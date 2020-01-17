<?php $title = htmlspecialchars($post['title']);
ob_start();?>

    <div class="postPage">
        <article>
            <div class="post">
                <h1 class="postTitle"><?=htmlspecialchars($post['title'])?></h1>
                <p class="postContent"> <?php echo $post['content']; ?> </p>
                <p class="postDate"> Posté le : <?php echo $post['creation_date_fr']; ?> </p>
            </div>
        </article>

        <section class="comments">
            <div class="commentsList">
                <h2>Commentaires</h2>
                
                <?php while ($comment = $comments->fetch()) 
                {
                    ?>
                    <p><b> <?php echo htmlspecialchars($comment['author']);?> </b></p> 
                    <p> <?php echo htmlspecialchars($comment['comment']);?> </p>
                    <p class="commentDate"> le <?php echo $comment['comment_date_fr']?> (<a href="index.php?action=reportComment&amp;commentId=<?= $comment['id']?>">Signaler</a>)</p>
                    <?php
                } 
                $comments->closeCursor();
                ?>
            </div>

            <div class="addComment">
                <h2>Ajouter un commentaire</h2>

                <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                    
                        <label for="author"> Auteur </label><br/>
                        <input type="text" id="author" name="author" required/>
                    
                        <label for="comment"> Commentaire </label><br/>
                        <textarea name="comment" id="comment" required></textarea>
                    
                        <input type="submit" class="submitButton"/>
                    
                </form>
            </div>
        </section>
    </div>
  
<?php $content = ob_get_clean(); 
require('template.php') ?>