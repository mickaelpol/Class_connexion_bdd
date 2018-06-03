<?php

namespace App;

class App
{

    const DB_NAME = "formPoo";
    const DB_USER = "root";
    const DB_PASS = "admin";
    const DB_HOST = "127.0.0.1";
    
    private static $database;


    public static function getDb()
    {
        if(self::$database === null){
            self::$database = new Database(self::DB_NAME, self::DB_HOST, self::DB_USER, self::DB_PASS);
        }
        return self::$database;
    }
    
}