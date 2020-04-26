<?php


namespace App\Table;

use App\App;

class Categorie
{

    public static function getAllCategories(){
        return App::getDB()->query('select * from categorie',__CLASS__);
    }

    public static function getCategorieByID($id){
        return App::getDB()->prepare('select * from categorie where id = ?',array($id), __CLASS__);
    }

    public static function addCategorie(array $post)
    {
        $req = "
                insert into categorie (nom,description)
                values (:nomCategorie,:descriptionCategorie)
             ";
        App::getDB()->prepare($req,$post,__CLASS__, 'insert');
    }

    public static function ubpdateCategorie ($array){
        $req = "
                update categorie
                set 
                nom = :nomCategorie ,
                description = :descriptionCategorie
                where id = :id
             ";
        App::getDB()->prepare($req,$array,__CLASS__, 'update');
    }

    public static function deleteCategorie(array $array)
    {
        $req = "
                DELETE FROM categorie
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
        return '?p=categorie&type=edit&id='.$this->id;
    }
    public function getDeleteLink(){
        return '?p=categorie&type=delete&id='.$this->id;
    }
    public function getShowLink(){
        return '?p=categorie&type=show&id='.$this->id;
    }

}