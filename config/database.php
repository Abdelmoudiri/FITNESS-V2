<?php
include ('config.php');

class DatabaseConnection {

    
    private static $instance = null; 
    private $connection;

    private function __construct() {
        try {
            $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {

    private static $instance = null; // Instance unique
    private $connection; // Connexion PDO

    // Constructeur privé pour empêcher l'instanciation directe
    private function __construct() {
        try {
            // Création de la connexion PDO
            $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
            // Configuration des erreurs
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // En cas d'erreur, le script s'arrête

            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self(); 
        }
        return self::$instance;
    }

    public function getConnection() {
        echo 'connecté <br>';
        return $this->connection; 
        
    }
}

$db = DatabaseConnection::getInstance();
$conn = $db->getConnection(); 
    // Méthode pour obtenir l'instance unique
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self(); // Crée une instance si elle n'existe pas
        }
        return self::$instance; // Retourne l'instance
    }

    // Méthode pour obtenir la connexion PDO
    public function getConnection() {
        echo 'connecté';
        return $this->connection; // Retourne l'objet PDO
        
    }
}

// Utilisation de la classe
$db = DatabaseConnection::getInstance(); // Obtenir l'instance unique
$conn = $db->getConnection(); // Obtenir la connexion PDO
