<?php
include "../config/database.php";
class User {
    protected $nom;
    protected $prenom;
    protected $email;
    protected $telephone;
    protected $password;
    
    public function __construct($nom, $prenom, $email, $telephone, $password)
    {
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> email = $email;
        $this -> telephone = $telephone;
        $this -> password = $password;
    }

    public function login($email, $password){
        $db = DatabaseConnection::getInstance(); // Obtenir l'instance unique
        $conn = $db->getConnection();
        
       
        
        // à diviser sur 2
        if ($user && $password= $user['password']) {

            if ($user['role'] === 'member') {
                return 'member';
            } else {
                return 'admin';
            }
        }
        return "Vous n'êtes pas inscrit !";
    }

    public function annulerReservation($id_reservation){
        $db = DatabaseConnection::getInstance(); // Obtenir l'instance unique
        $conn = $db->getConnection();

        $stmt = $conn->prepare("UPDATE reservations SET statut = 'Annulee' WHERE id_reservation = ?");
        $stmt->execute([$id_reservation]);
    }




















// ---------------------------------------------------------
}
$userr = new User("ty","mohamed","yyy@gmail.com","0666666666","dadssi");

$showw=$userr->login("yyy@gmail.com","dadssi");

echo $showw;







?>

