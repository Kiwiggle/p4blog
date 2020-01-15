<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Posté le</th>
        </tr>
    </thead>
    <tbody>
<?php
while ($data = $posts->fetch()) 
    {
    ?>
        <tr>
            <td><?= $data['title'] ?></td>
            <td><?= $data['date_creation_fr']?></td>
            <td><button onclick="location.href='index.php?action=modifyPost&amp;id=<?= $data['id']?>'" type="button">
            Modifier</button></td>
            <td><button onclick="location.href='index.php?action=deletePost&amp;id=<?= $data['id']?>'" type="button">
            Supprimer</button></td>
        </tr>
    <?php
    }    
?>
    </tbody>
</table>