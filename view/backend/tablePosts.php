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
            <td><button>Modifier</button></td>
            <td><button>Supprimer</button></td>
        </tr>
    <?php
    }    
?>
    </tbody>
</table>