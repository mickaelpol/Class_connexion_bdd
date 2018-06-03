<?php 

namespace App;

use \PDO;

/**
 * Class Database
 */
class Database
{

    /**
     * Variable recevant le port de la base de données  
     *
     * @var string
     */
    private $db_host;

    /**
     * Variable recevant le nom de la base de données
     *
     * @var string
     */
    private $db_name;

    /**
     * Variable recevant l'username
     *
     * @var string
     */
    private $db_user;

    /**
     * variable recevant le mot de passe de la base de données
     *
     * @var string
     */
    private $db_pass;

    /**
     * Variable recevant l'instance de la connexion a la base de données
     *
     * @var string
     */
    private $pdo;
    
    public function __construct($db_name, $db_host, $db_user, $db_pass)
    {
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }
    
    /**
     * Fonctione initialisant la connexion a la base de données et retourne l'instance dans $pdo
     *
     */
    private function getPDO()
    {
        if($this->pdo === null){
            $pdo = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    /**
     * Fonctione permettant de récupérer les données d'une table
     *
     * @param string $statement
     * @return string
     */
    public function query($statement){
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_CLASS);
        return $datas;
    }

    /**
     * Fonction qui créer une requete d'insertion de data dans la base de données
     *
     * @param string $requete
     * @return integer
     */
    public function runQuery($requete){
        try {
            $count = $this->getPDO()->exec($requete);
        }catch(\PDOException $e){
            echo __LINE__. $e->getMessage();
        };
        return $count;
    }
    
}