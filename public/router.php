<?php

include_once "User.php";
include_once "Member.php";
include_once "Admin.php";

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    switch ($action) {
        case 'ajouterReservation':
            if (isset($_POST['id_activite']) && isset($_POST['date_reservation'])) {
                
                $id_user = 1; 
                $id_activite = $_POST['id_activite'];
                $date_reservation = $_POST['date_reservation'];

                $member = new Member($id_user, "John", "Doe", "john.doe@example.com", "0601234567", "password123");
                echo $member->ajouterReservation($id_activite, $date_reservation);
            } else {
                echo "Veuillez fournir tous les paramètres nécessaires pour la réservation.";
            }
            break;
        
        case 'afficherReservations':
            $id_user = 1; 
            $member = new Member($id_user, "John", "Doe", "john.doe@example.com", "0601234567", "password123");
            $reservations = $member->afficherReservations();
            foreach ($reservations as $reservation) {
                echo "Réservation ID: " . $reservation['id_reservation'] . ", Activité: " . $reservation['nom_activite'] . ", Date: " . $reservation['date_reservation'] . ", Statut: " . $reservation['statut'] . "<br>";
            }
            break;
        
        case 'annulerReservation':
            if (isset($_GET['id_reservation'])) {
                $id_reservation = $_GET['id_reservation'];
                $id_user = 1; 
                $member = new Member($id_user, "John", "Doe", "john.doe@example.com", "0601234567", "password123");
                echo $member->annulerReservation($id_reservation);
            } else {
                echo "Veuillez spécifier un ID de réservation à annuler.";
            }
            break;
        
        default:
            echo "Action non reconnue.";
            break;
    }
} else {
    echo "Aucune action spécifiée.";
}
?>
