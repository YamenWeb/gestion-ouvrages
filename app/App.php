<?php

namespace App;

class App
{
    const DB_NAME = 'gestion-ouvrages';
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '';
    private static $database;

    public static function getDB(){
        if(self::$database === NULL){
            self::$database = new Database(self::DB_NAME, self::DB_HOST, self::DB_USER,self::DB_PASS);
        }
        return self::$database;
    }
}