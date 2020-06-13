<?php 
$title = htmlspecialchars($post['title']);
ob_start();?>

    <div class="postPage">
        <article>
            <div class="post">
                <h1 class="postTitle"><?=htmlspecialchars($post['title'])?></h1>
                <p class="postContent"> <?php echo $post['content']; ?> </p>
                <p class="postDate"> Posté le : <?php echo $post['creation_date_fr']; ?> </p>
                <?php echo $dump; ?>
            </div>
        </article>

        <?php if ($_SESSION['role'] == 'admin') { ?>
            <div class="adminActions">
                <a href="index.php?action=updatePost&amp;id= <?= $_GET['id']?>"> <p> Modifier </p> </a>
                <a href="index.php?action=deletePost&amp;id= <?= $_GET['id']?>"> <p> Supprimer </p> </a>
            </div>
        <?php } ?>

        <section class="comments">
            <div class="commentsList">


                <h2>Commentaires</h2>
                    
                <?php while ($comment = $comments->fetch()) 
                {
                    ?>
                    <p><b> <?php echo htmlspecialchars($comment['author']);?> </b></p> 
                    <p> <?php echo htmlspecialchars($comment['comment']);?> </p>
                    <p class="commentDate"> le 
                        <?php echo $comment['comment_date_fr']; 
                        if ($comment['reported'] == 0) {
                            echo ' (<a href="index.php?action=reportComment&amp;commentId=' . $comment['id'] . '">Signaler</a>)';
                        } else {
                            echo ' (Commentaire validé par la modération)';
                        }; ?> 
                    </p>
                    <?php
                } 
                $comments->closeCursor(); ?>
               
            </div>

            <div class="addComment">
                <h2>Ajouter un commentaire</h2>

                <?php if (isset($_SESSION) && $_SESSION['role'] == 'member' || $_SESSION['role'] == 'admin') 
                { ?>
                    
                    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                    
                        <label for="author"> Vous êtes connecté en tant que : <?php echo $_SESSION['name']?> </label><br/>
                        <input type="hidden" id="author" name="author" value="<?php echo $_SESSION['name']?>" required/>
                    
                        <label for="comment"> Votre commentaire : </label><br/>
                        <textarea name="comment" id="comment" required></textarea>
                    
                        <input type="submit" class="submitButton"/>
                    
                    </form>
                    
                <?php    
                } else { 
                    echo '<p style="text-align:center;">Seuls les membres inscrits peuvent laisser un commentaire</p>';
                }?>

                <a href="index.php" class="back-index">Retour à l'accueil du site</a>

                
            </div>
        </section>
    </div>
  
<?php $content = ob_get_clean(); 
require('template.php') ?>