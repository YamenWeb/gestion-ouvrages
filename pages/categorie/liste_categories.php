<?php
$datas = \App\Table\Categorie::getAllCategories();
?>

<div class="jumbotron">
    <h1>Application des gestion d'ouvrage : Liste des catégories</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-9">
        </div>
        <div class="col-3">
            <a class="btn btn-outline-success btn-lg btn-block" href="?p=categorie&type=add" role="button">Ajouter une categorie</a>
        </div>
    </div>
</div>
<br>
<table class="table table-striped table-dark">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom</th>
        <th scope="col">Show</th>
        <th scope="col">Modifier</th>
        <th scope="col">Supprimer</th>
    </tr>
    </thead>
    <tbody>
    <?php
    /** @var \App\Table\Categorie $categorie */
    foreach ($datas as $categorie) { ?>
    <tr>
        <th scope="row"><?=$categorie->id; ?></th>
        <td><?=$categorie->nom; ?></td>
        <?php
        // Utilisation d'une methode magique
        ?>
        <td><a class="btn btn-outline-primary" href="<?php echo $categorie->showLink;?>" role="button">Afficher</a></td>
        <td><a class="btn btn-outline-warning" href="<?php echo $categorie->editLink;?>" role="button">Modifier</a></td>
        <td><a class="btn btn-outline-danger" href="<?php echo $categorie->deleteLink;?>" role="button">Supprimer</a></td>
    </tr>
    <?php } ?>
    </tbody>
</table>