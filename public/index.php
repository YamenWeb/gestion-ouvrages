<?php

use App\Autoloader;

require '../app/Autoloader.php';
Autoloader::register();

if(isset($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = 'home';
}

//------------------- Debut Initialisation des objets ------------------
//$db = new App\Database('gestion-ouvrages');
//-------------------- Fin --------------------------------
ob_start();
if($p === 'home')
{
    require '../pages/home.php';
}
if($p === 'auteurs')
{
    require '../pages/auteur/liste_auteurs.php';
}

if($p === 'auteur')
{
    if($_GET['type'] === 'edit'){
        $data = \App\Table\Auteur::getAuteurByID($_GET['id']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $array = array (id => $_GET['id'], nomAuteur => $_POST['nomAuteur'], prenomAuteur => $_POST['prenomAuteur']);
            \App\Table\Auteur::ubpdateAuteur($array);
            header('Location: ?p=auteurs');
        }
    }
    if($_GET['type'] === 'add'){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            \App\Table\Auteur::addAuteur($_POST);
            header('Location: ?p=auteurs');
        }
    }
    if($_GET['type'] === 'delete'){
        var_dump($_GET);
        \App\Table\Auteur::deleteAuteur(array('id' => $_GET['id']));
        header('Location: ?p=auteurs');
    }
    require '../pages/auteur/form-auteur.php';
}
if($p === 'categories')
{
    require '../pages/categorie/liste_categories.php';
}

if($p === 'categorie')
{
    if($_GET['type'] === 'add'){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            \App\Table\Categorie::addCategorie($_POST);
            header('Location: ?p=categories');
        }
    }

    if($_GET['type'] === 'edit'){
        $data = \App\Table\Categorie::getCategorieByID($_GET['id']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $array = array (id => $_GET['id'], nomCategorie => $_POST['nomCategorie'], descriptionCategorie => $_POST['descriptionCategorie']);
            \App\Table\Categorie::ubpdateCategorie($array);
            header('Location: ?p=categories');
        }
    }

    if($_GET['type'] === 'delete'){
        var_dump($_GET);
        \App\Table\Categorie::deleteCategorie(array('id' => $_GET['id']));
        header('Location: ?p=categories');
    }

    require '../pages/categorie/form-categorie.php';
}

if($p === 'ouvrages')
{
    require '../pages/ouvrage/liste_ouvrage.php';
}

if($p === 'ouvrage')
{
    $auteurs = \App\Table\Auteur::getAllAuteurs();
    $categories = \App\Table\Categorie::getAllCategories();
    if($_GET['type'] === 'edit'){
        $data = \App\Table\Ouvrage::getOuvrageByID($_GET['id']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $array = array (id => $_GET['id'], titreOuvrage => $_POST['titreOuvrage'], descriptionOuvrage => $_POST['descriptionOuvrage'],idAuteur => $_POST['idAuteur'],idCategorie => $_POST['idCategorie']);
            \App\Table\Ouvrage::ubpdateOuvrage($array);
            header('Location: ?p=ouvrages');
        }
    }
    if($_GET['type'] === 'add'){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            \App\Table\Ouvrage::addOuvrage($_POST);
            header('Location: ?p=ouvrages');
        }
    }

    if($_GET['type'] === 'delete'){
        var_dump($_GET);
        \App\Table\Ouvrage::deleteOuvrage(array('id' => $_GET['id']));
        header('Location: ?p=ouvrages');
    }

    require '../pages/ouvrage/form-ouvrage.php';
}

$content = ob_get_clean();
require '../pages/template/default.php';
