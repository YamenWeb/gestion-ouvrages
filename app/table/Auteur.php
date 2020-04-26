<?php


namespace App\Table;
use App\App;

class Auteur
{
    public static function getAllAuteurs(){
        return App::getDB()->query('select * from auteur',__CLASS__);
    }

    public static function getAuteurByID($id){
        return App::getDB()->prepare('select * from auteur where id = ?',array($id), __CLASS__);
    }

    public static function ubpdateAuteur ($array){
        $req = "
                update auteur
                set 
                nom = :nomAuteur ,
                prenom = :prenomAuteur
                where id = :id
             ";
        App::getDB()->prepare($req,$array,__CLASS__, 'update');
    }

    public static function addAuteur(array $post)
    {
        $req = "
                insert into auteur (nom,prenom)
                values (:nomAuteur,:prenomAuteur)
             ";
        App::getDB()->prepare($req,$post,__CLASS__, 'insert');
    }

    public static function deleteAuteur(array $array)
    {
        $req = "
                DELETE FROM auteur
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
        return '?p=auteur&type=edit&id='.$this->id;
    }
    public function getDeleteLink(){
        return '?p=auteur&type=delete&id='.$this->id;
    }

}