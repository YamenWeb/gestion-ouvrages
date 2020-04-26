<?php
$nomAuteur = '';
$prenomAuteur ='';

/** @var \App\Table\Auteur $data */
if(isset($data)){
    $nomAuteur = $data->nom;
    $prenomAuteur = $data->prenom;
}
?>
<form method="post">
  <div class="form-group">
    <label for="nomAuteur">Nom : </label>
    <input type="text" class="form-control" id="nomAuteur" name="nomAuteur" value="<?=$nomAuteur; ?>">
  </div>
  <div class="form-group">
    <label for="prenomAuteur">Prenom : </label>
    <input type="text" class="form-control" id="prenomAuteur" name="prenomAuteur" value="<?=$prenomAuteur; ?>">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>