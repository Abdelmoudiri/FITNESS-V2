<?php
include "../config/database.php";

class Reservation {
    private $id_reservation;
    private $id_user;
    private $id_activity;
    private $date_reservation;
    private $statut;

    public function __construct($id_user, $id_activity, $date_reservation = null, $statut = 'En attente') {
        $this->id_user = $id_user;
        $this->id_activity = $id_activity;
        $this->date_reservation = $date_reservation ?: date('Y-m-d H:i:s');
        $this->statut = $statut;
    }

    public function createReservation() {
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("INSERT INTO reservations (id_user, id_activity, date_reservation, statut) VALUES (?, ?, ?, ?)");
        try {
            $stmt->execute([$this->id_user, $this->id_activity, $this->date_reservation, $this->statut]);
            return "Réservation créée avec succès.";
        } catch (PDOException $e) {
            return "Erreur lors de la création de la réservation : " . $e->getMessage();
        }
    }

    public static function getReservationById($id_reservation) {
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT * FROM reservations WHERE ID_Reservation = ?");
        $stmt->execute([$id_reservation]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getReservationsByUser($id_user) {
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT * FROM reservations WHERE id_user = ?");
        $stmt->execute([$id_user]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function updateReservationStatus($id_reservation, $statut) {
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("UPDATE reservations SET statut = ? WHERE ID_Reservation = ?");
        try {
            $stmt->execute([$statut, $id_reservation]);
            return "Statut de la réservation mis à jour avec succès.";
        } catch (PDOException $e) {
            return "Erreur lors de la mise à jour du statut : " . $e->getMessage();
        }
    }

    public static function deleteReservation($id_reservation) {
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("DELETE FROM reservations WHERE ID_Reservation = ?");
        try {
            $stmt->execute([$id_reservation]);
            return "Réservation supprimée avec succès.";
        } catch (PDOException $e) {
            return "Erreur lors de la suppression de la réservation : " . $e->getMessage();
        }
    }
}

$reservation = new Reservation(1, 2); 
echo $reservation->createReservation(); 

$reservationDetails = Reservation::getReservationById(1);
print_r($reservationDetails);

$userReservations = Reservation::getReservationsByUser(1); 
print_r($userReservations);

echo Reservation::updateReservationStatus(1, 'Confirmee'); 
echo Reservation::deleteReservation(1); 
?>
