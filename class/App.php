<?php

namespace App;

/**
 * Class App
 */
class App
{

    /**
     * Constante permettant la connexion a la base de données
     */

    /**
     * Nom de la base de données
     */
    const DB_NAME = "formPoo";

    /**
     * Username de la base de données
     */
    const DB_USER = "root";

    /**
     * Mot de passe de la base de données
     */
    const DB_PASS = "admin";

    /**
     * Port de la base de données
     */
    const DB_HOST = "127.0.0.1";
    
    /**
     * database sera la config pour se connecter a la base de données
     *
     * @var array
     */
    private static $database;


    /**
     * Fonction static permettant d'initialiser la connexion à la base de données si elle n'es pas déjà créer
     *
     * @return array
     */
    public static function getDb()
    {
        if(self::$database === null){
            self::$database = new Database(self::DB_NAME, self::DB_HOST, self::DB_USER, self::DB_PASS);
        }
        return self::$database;
    }
    
}