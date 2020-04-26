<?php

namespace App;
use \PDO;
class Database 
{
    private $dbUser ;
    private $dbPass ;
    private $dbHost ;
    private $dbName ;
    private $DB_Instance;

    public function __construct($dbName,$host = 'localhost',$user = 'root',$pass = '')
    {
        $this->dbUser = $user;
        $this->dbPass = $pass;
        $this->dbHost = $host;
        $this->dbName = $dbName;
    }

    private function getDBInstance(){
        if($this->DB_Instance === null){
            $this->DB_Instance = new PDO('mysql:dbname='.$this->dbName.';host='.$this->dbHost, $this->dbUser, $this->dbPass);
            $this->DB_Instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->DB_Instance;
    }

    public function query($sql, $class_name){
        $query = $this->getDBInstance()->query($sql);
        $datas = $query->fetchAll(PDO::FETCH_CLASS,$class_name);
        return $datas;
        
    }

    public function prepare($sql,$attributes,$class_name, $type = 'select'){
        $query = $this->getDBInstance()->prepare($sql);
        $query->execute($attributes);
        if($type === 'select'){
            $query->setFetchMode(PDO::FETCH_CLASS,$class_name);
            $data = $query->fetch();
            return $data;
        }
    }
}
