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
        
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
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

    public function updateInformations($id_user,$telephone, $password){
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("UPDATE user SET telephone = ?, password = ? WHERE id = ?");
        try {
            $stmt->execute([$telephone, $password, $id_user]);
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
        }
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