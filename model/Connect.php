<?php

// Connection à la base de données et renvoie l'objet PDO
/*function connect() {
    // hôte
    $servername = 'localhost';

    // nom de la base de données
    $dbname = 'mydb';

    // identifiant et mot de passe de connexion à la BDD
    $username = 'root';
    $password = '';
    
    // Tentative de connexion avec levée d'une exception en cas de problème
    try{
        $dsn="mysql:host=$servername;dbname=$dbname";
        $conn=new PDO($dsn,$username,$password);
        return $conn;
    } catch (PDOException $e){
      echo "Connection failed: ". $e->getMessage();
    }
}
*/

class DB
{

    // à compléter avec les infos de votre base de données
    private const HOST = 'localhost';
    private const DB = 'mydb';
    private const USER = 'root';
    private const PWD = '';

    /* singleton */
    private $database; //on le met en static pour qu'il soit partagé avec toutes les instances des
    // classes qui heriteront de la class Model (classes filles de Model)

    /**
     * Cette fonction sera appellée par getDatabase() la premiere fois pour
     * initialiser la connexion avec la base de données
     */
    private function initDatabase(){
            $this->database = new PDO('mysql:host='. self::HOST . ';dbname='. self::DB,
                self::USER,
                self::PWD,
                [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']
            );
            //gestion des erreurs
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

      
    }

    //design pattern singleton
     function getDatabase()
    {
        // la premiere fois on initialise self::$database
        if ($this->database === null) {
            $this->initDatabase();
        }
        // et on renvoie l'objet qui sert à effectuer les requêtes
        return $this->database;
    }

}

$database = new DB();
$db = $database->getDatabase();