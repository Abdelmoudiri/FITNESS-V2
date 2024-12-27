<?php
include "../models/Reservation.php";

class ReservationController {

    public function createReservation($id_user, $id_activity, $date_reservation = null, $statut = 'En attente') {
        $reservation = new Reservation($id_user, $id_activity, $date_reservation, $statut);
        return $reservation->createReservation();
    }

    public function getReservationById($id_reservation) {
        $reservation = Reservation::getReservationById($id_reservation);
        if ($reservation) {
            return $reservation;
        } else {
            return "Réservation introuvable.";
        }
    }

    public function getReservationsByUser($id_user) {
        $reservations = Reservation::getReservationsByUser($id_user);
        if ($reservations) {
            return $reservations;
        } else {
            return "Aucune réservation trouvée pour cet utilisateur.";
        }
    }

    public function updateReservationStatus($id_reservation, $statut) {
        return Reservation::updateReservationStatus($id_reservation, $statut);
    }

    public function deleteReservation($id_reservation) {
        return Reservation::deleteReservation($id_reservation);
    }
}

$reservationController = new ReservationController();

echo $reservationController->createReservation(1, 2);

print_r($reservationController->getReservationById(1));

print_r($reservationController->getReservationsByUser(1));

echo $reservationController->updateReservationStatus(1, 'Confirmee');

echo $reservationController->deleteReservation(1);
?>
