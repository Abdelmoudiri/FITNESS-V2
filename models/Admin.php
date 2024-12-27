<?php
include "../config/database.php";

class Admin extends User {
    
    private $role;
    
    public function __construct($nom, $prenom, $email, $telephone, $password)
    {
        parent::__construct($nom, $prenom, $email, $telephone, $password);
        $this -> role = 'admin';
    }


    public function deleteMember($id_user){
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();
        
        $stmt = $conn->prepare("DELETE FROM user WHERE id_user = ?");
        try {
            $stmt->execute([$id_user]);
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    }
    

    public function addActivity($nom_Activite, $description, $capacite, $date_debut, $date_fin){
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("INSERT INTO activities (nom_Activite, description, capacite, date_debut, date_fin) VALUES (?, ?, ?, ?, ?)");
        try {
            $stmt->execute([$nom_Activite, $description, $capacite, $date_debut, $date_fin]);
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    }

    public function updateActivity($id_Activite, $nom_Activite, $description, $capacite, $date_debut, $date_fin){
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("UPDATE activities SET nom_Activite = ?, description = ?, capacite = ?, date_debut= ?, date_fin= ? WHERE id_activity = ?");
        try {
            $stmt->execute([$nom_Activite, $description, $capacite, $date_debut, $date_fin, $id_Activite]);
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    }

    public function deleteActivity($id_Activite){
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("DELETE FROM activities WHERE id_activity = ?");
        try {
            $stmt->execute([$id_Activite]);
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression : " . $e->getMessage();
        }

    public function manageReservations($id_reservation, $statut){
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("UPDATE reservations SET statut = ?");
        try {
            $stmt->execute([$statut]);
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    }
}
?>

