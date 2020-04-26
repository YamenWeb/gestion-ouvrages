<?php
$nomCategorie = '';
$descriptionCategorie ='';

/** @var \App\Table\Categorie $data */
if(isset($data)){
    $nomCategorie = $data->nom;
    $descriptionCategorie = $data->description;
}
?>
<form method="post">
    <div class="form-group">
        <label for="nomCategorie">Nom : </label>
        <input type="text" class="form-control" id="nomCategorie" name="nomCategorie" value="<?=$nomCategorie; ?>">
    </div>
    <div class="form-group">
        <label for="descriptionCategorie">Description : </label>
        <textarea class="form-control" id="descriptionCategorie" name="descriptionCategorie" rows="3"><?=$descriptionCategorie; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>