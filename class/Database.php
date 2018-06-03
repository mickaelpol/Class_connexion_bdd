<?php 

namespace App;

use \PDO;

class Database
{

    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;
    private $pdo;
    
    public function __construct($db_name, $db_host = "127.0.0.1", $db_user = "root", $db_pass = "admin")
    {
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }
    
    private function getPDO()
    {
        if($this->pdo === null){
            $pdo = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($statement){
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_CLASS);
        return $datas;
    }

    
    public function runQuery($requete){
        try {
            $count = $this->getPDO()->exec($requete);
        }catch(\PDOException $e){
            echo __LINE__. $e->getMessage();
        };
        return $count;
    }
    
}