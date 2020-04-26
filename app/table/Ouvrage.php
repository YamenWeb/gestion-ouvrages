<?php


namespace App\Table;
use App\App;
use App\Table\Auteur;
use App\Table\Categorie;

class Ouvrage
{
    private $auteur;
    private $categorie;

    public function __construct()
    {
        $this->setAuteur(new Auteur());
        $this->setCategorie(new Categorie());
    }

    public static function getAllOuvrages(){
        return App::getDB()->query('select * from ouvrage',__CLASS__);
    }



    public static function getOuvrageByID($id){
        return App::getDB()->prepare('select * from ouvrage where id = ?',array($id), __CLASS__);
    }

    public static function ubpdateOuvrage ($array){
        var_dump($array);
        $req = "
                update ouvrage
                set 
                titre = :titreOuvrage ,
                description = :descriptionOuvrage ,
                id_auteur = :idAuteur,
                id_categorie = :idCategorie
                where id = :id
             ";
        App::getDB()->prepare($req,$array,__CLASS__, 'update');
    }

    public static function addOuvrage(array $post)
    {
        $req = "
                insert into ouvrage (titre,description,id_auteur,id_categorie)
                values (:titreOuvrage,:descriptionOuvrage,:idAuteur,:idCategorie)
             ";
        App::getDB()->prepare($req,$post,__CLASS__, 'insert');
    }

    public static function deleteOuvrage(array $array)
    {
        $req = "
                DELETE FROM ouvrage
                WHERE id = :id
             ";
        App::getDB()->prepare($req,$array,__CLASS__, 'delete');
    }

    public function __get($name)
    {
        $method = 'get'.ucfirst($name);
        return $this->$method();
    }

    public function getEditLink(){
        return '?p=ouvrage&type=edit&id='.$this->id;
    }
    public function getDeleteLink(){
        return '?p=ouvrage&type=delete&id='.$this->id;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param \App\Table\Auteur $auteur
     */
    public function setAuteur( $auteur)
    {
        $this->auteur = $auteur::getAuteurByID($this->id_auteur);;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param \App\Table\Categorie $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie::getCategorieByID($this->id_categorie);
    }

}