<?php
// --- Classe de la connexion à la base de donnée
class db_connection {
    private $db;

    public function __construct()
    {
        $this -> db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        if ($this -> db -> connect_error){
            die("<h1>Erreur : Echec de la connexion à la base de donnée" . $this -> db -> connect_error . "</h1>");
        }
        echo "<h1>Connexion réuissie à la base de donnée </h1>";
    }

    public function getConnection(){
        return $this-> db;
    }
}
// ---------------------------------------------------------
?>