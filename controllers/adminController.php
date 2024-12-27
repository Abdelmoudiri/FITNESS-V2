<?php
include_once "../models/User.php";
include_once "../models/Activity.php";
include_once "../models/Reservation.php";

class Admin extends User {
    private $role;

    public function __construct($nom, $prenom, $email, $telephone, $password) {
        parent::__construct($nom, $prenom, $email, $telephone, $password);
        $this->role = 'admin';
    }
// -----DELETE MEMBER ----------------------------------------------------------------------------------------------
    public function deleteMember($id_user) {
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("DELETE FROM user WHERE id_user = ?");
        try {
            $stmt->execute([$id_user]);
            return "Membre supprimé avec succès.";
        } catch (PDOException $e) {
            return "Erreur lors de la suppression du membre : " . $e->getMessage();
        }
    }
// -----ADD ACTIVITY ------------------------------------------------------------------------------------------------
    public function addActivity($nom_Activite, $description, $capacite, $date_debut, $date_fin) {
        $activity = new Activity($nom_Activite, $description, $capacite, $date_debut, $date_fin);
        return $activity->createActivity();
    }
// -----UPDATE ACTIVITY ---------------------------------------------------------------------------------------------
    public function updateActivity($id_Activite, $nom_Activite, $description, $capacite, $date_debut, $date_fin) {
        $activity = new Activity($nom_Activite, $description, $capacite, $date_debut, $date_fin);
        return $activity->updateActivity($id_Activite);
    }
// -----DELETE ACTIVITY ---------------------------------------------------------------------------------------------
    public function deleteActivity($id_Activite) {
        return Activity::deleteActivity($id_Activite);
    }
// -----MANAGE RESERVATIONS ------------------------------------------------------------------------------------------
    public function manageReservations($id_reservation, $statut) {
        return Reservation::updateReservationStatus($id_reservation, $statut);
    }
}

$admin = new Admin("Admin", "User", "admin@example.com", "0600000000", "password123");

// echo $admin->deleteMember(2);

// echo $admin->addActivity("Fitness", "Session d'entraînement intensif", 30, "2025-01-10", "2025-01-20");

// echo $admin->updateActivity(1, "Yoga Avancé", "Cours pour avancés", 25, "2025-02-01", "2025-02-15");

// echo $admin->deleteActivity(1);

// echo $admin->manageReservations(1, "Confirmee");
?>
