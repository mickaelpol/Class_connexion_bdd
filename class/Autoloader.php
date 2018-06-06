<?php

namespace App;

/**
 * Class Autoloader à modifer en fonction de ou se trouve vos Class
 */
class Autoloader
{

    /**
     * Retourne la fonction autoload
     *
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    
    /**
     * Lance la fonction autoload allant chercher les class dans le bon dossier et le bon fichier
     * à modifier selon vos spécificités
     *
     * @param string $class
     * @return void
     */
    static function autoload($class)
    {
        $class = str_replace(__NAMESPACE__."\\", "", $class);
        $class = str_replace('\\', '/', $class);
        require '../class/' . $class . '.php';
    }
    
}