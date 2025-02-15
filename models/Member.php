<?php
include_once "User.php";

class Member extends User {
    private $id;

    public function __construct($id, $nom, $prenom, $email, $telephone, $password) {
        parent::__construct($nom, $prenom, $email, $telephone, $password);
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function ajouterReservation($id_activite, $date_reservation) {
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("INSERT INTO reservations (id_user, id_activite, date_reservation, statut) VALUES (?, ?, ?, 'Confirmée')");
        try {
            $stmt->execute([$this->id, $id_activite, $date_reservation]);
            return "Réservation ajoutée avec succès.";
        } catch (PDOException $e) {
            return "Erreur lors de l'ajout de la réservation : " . $e->getMessage();
        }
    }

    public function afficherReservations() {
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT r.id_reservation, a.nom_activite, r.date_reservation, r.statut 
                                FROM reservations r
                                JOIN activites a ON r.id_activite = a.id_activite
                                WHERE r.id_user = ?");
        $stmt->execute([$this->id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function annulerReservation($id_reservation) {
        parent::annulerReservation($id_reservation);
    }
}

?>
