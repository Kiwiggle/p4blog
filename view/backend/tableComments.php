<table>
    <thead>
        <tr>
            <th>Auteur</th>
            <th>Commentaire</th>
            <th>Posté le</th>
            <th>Billet</th>
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
            <td> <a href="index.php?action=post&amp;id=<?= $data['postid']?>"> <?= $data['title']?> </a> </td>
        </tr>
    <?php
    }    
?>
    </tbody>
</table>