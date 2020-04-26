<?php

namespace App;

class Autoloader{

    /**
     * Enregistre notre autoloader
     */
    static function register(){

        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class){
        if (strpos($class, __NAMESPACE__ . '\\') === 0){
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
        // __DIR__ : une constante qui contient le nom du dossier parent ( là c'est le dossier APP)
        require __DIR__.'\\' .$class.'.php';
        }
    }

}