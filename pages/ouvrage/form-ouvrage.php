<?php
//var_dump($auteurs);
//var_dump($categories);
$titreOuvrage = '';
$descriptionOuvrage ='';
$idAuteur = 0;
$idCategorie = 0;

/** @var \App\Table\Ouvrage $data */
if(isset($data)){
    $titreOuvrage = $data->titre;
    $descriptionOuvrage = $data->description;
    $idAuteur = $data->getAuteur()->id;
    $idCategorie = $data->getCategorie()->id;
}
?>
<form method="post">
  <div class="form-group">
    <label for="nomAuteur">Titre : </label>
    <input type="text" class="form-control" id="titreOuvrage" name="titreOuvrage" value="<?=$titreOuvrage; ?>">
  </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="idAuteur">Auteur : </label>
                <select class="form-control" id="idAuteur" name="idAuteur">
                    <option>Default select</option>
                    <?php foreach ( $auteurs as $auteur) { ?>
                    <option value="<?=$auteur->id; ?>" <?php if($auteur->id == $idAuteur) echo 'Selected';?>><?=$auteur->prenom.' '.$auteur->nom; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="idCategorie">Categorie : </label>
                <select class="form-control" id="idCategorie" name="idCategorie">
                    <option value="0">Default select</option>
                    <?php foreach ( $categories as $category) { ?>
                        <option value="<?=$category->id; ?>" <?php if($category->id == $idCategorie) echo 'Selected';?>><?=$category->nom; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="descriptionCategorie">Description : </label>
        <textarea class="form-control" id="descriptionOuvrage" name="descriptionOuvrage" rows="3"><?=$descriptionOuvrage; ?></textarea>
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>