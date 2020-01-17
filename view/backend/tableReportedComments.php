<?php 
$nbr = $comments->rowCount();

if ($nbr > 0) {
?>
    <table>
        <thead>
            <tr>
                <th>Auteur</th>
                <th>Commentaire</th>
                <th>Posté le</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while ($data = $comments->fetch()) 
            {
            ?>
                <tr>
                    <td><?= $data['author'] ?></td>
                    <td><?= $data['comment']?></td>
                    <td><?= $data['comment_date_fr']?></td>
                    <td><button onclick="location.href='index.php?action=deleteComment&amp;id=<?= $data['id']?>'" type="button">
                    Supprimer</button></td>
                </tr>
            <?php
            }    
        ?>
            </tbody>
        </table>
<?php
} else {
    echo '<p>Aucun commentaire signalé</p>';
} ?>

       


