<?php

$datas = \App\Table\Auteur::getAllAuteurs();
//var_dump($datas);
?>

<div class="jumbotron">
    <h1>Application des gestion d'ouvrage : Liste des auteurs</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-9">
        </div>
        <div class="col-3">
            <a class="btn btn-outline-success btn-lg btn-block" href="?p=auteur&type=add" role="button">Ajouter un auteur</a>
        </div>
    </div>
</div>
<br>
<table class="table table-striped table-dark">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Modifier</th>
    </tr>
    </thead>
    <tbody>
    <?php
    /** @var \App\Table\Auteur $auteur */
    foreach ($datas as $auteur) { ?>
    <tr>
        <th scope="row"><?=$auteur->id; ?></th>
        <td><?=$auteur->nom; ?></td>
        <td><?=$auteur->prenom; ?></td>
        <?php
        // Utilisation d'une methode magique
        ?>
        <td><a class="btn btn-outline-warning" href="<?php echo $auteur->editLink;?>" role="button">Modifier</a></td>
        <td><a class="btn btn-outline-danger" href="<?php echo $auteur->deleteLink;?>" role="button">Supprimer</a></td>
    </tr>
    <?php } ?>
    </tbody>
</table>