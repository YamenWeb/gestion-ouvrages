<?php

$datas = \App\Table\Ouvrage::getAllOuvrages();
//var_dump($datas);
?>

<div class="jumbotron">
    <h1>Application des gestion d'ouvrage : Liste des ouvrages</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-9">
        </div>
        <div class="col-3">
            <a class="btn btn-outline-success btn-lg btn-block" href="?p=ouvrage&type=add" role="button">Ajouter un ouvrage</a>
        </div>
    </div>
</div>
<br>
<table class="table table-striped table-dark">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Titre</th>
        <th scope="col">Auteur</th>
        <th scope="col">Catégorie</th>
        <th scope="col">Modifier</th>
    </tr>
    </thead>
    <tbody>
    <?php
    /** @var \App\Table\Ouvrage $ouvrage */
    foreach ($datas as $ouvrage) { ?>
    <tr>
        <th scope="row"><?=$ouvrage->id; ?></th>
        <td><?=$ouvrage->titre; ?></td>
        <td><?=$ouvrage->getAuteur()->prenom.' '.$ouvrage->getAuteur()->nom; ?></td>
        <td><?=$ouvrage->getCategorie()->nom?></td>
        <?php
        // Utilisation d'une methode magique
        ?>
        <td><a class="btn btn-outline-warning" href="<?php echo $ouvrage->editLink;?>" role="button">Modifier</a></td>
        <td><a class="btn btn-outline-danger" href="<?php echo $ouvrage->deleteLink;?>" role="button">Supprimer</a></td>
    </tr>
    <?php } ?>
    </tbody>
</table>