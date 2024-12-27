<?php


include_once "../config/database.php";

class Activity {
    private $id_activity;
    private $nom_activite;
    private $description;
    private $capacite;
    private $date_debut;
    private $date_fin;
    private $est_disponible;

    public function __construct($nom_activite, $description, $capacite, $date_debut, $date_fin, $est_disponible = true) {
        $this->nom_activite = $nom_activite;
        $this->description = $description;
        $this->capacite = $capacite;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->est_disponible = $est_disponible;
    }
   

    public function createActivity() {
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("INSERT INTO activities (nom_activite, description, capacite, date_debut, date_fin, est_disponible) VALUES (?, ?, ?, ?, ?, ?)");
        try {
            $stmt->execute([$this->nom_activite, $this->description, $this->capacite, $this->date_debut, $this->date_fin, $this->est_disponible]);
            return "Activité créée avec succès.";
        } catch (PDOException $e) {
            return "Erreur lors de la création de l'activité : " . $e->getMessage();
        }
    }

    public static function getActivityById($id_activity) {
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT * FROM activities WHERE id_activity = ?");
        $stmt->execute([$id_activity]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function getAllActivity() {
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT * FROM activities ");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateActivity($id_activity) {
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("UPDATE activities SET nom_activite = ?, description = ?, capacite = ?, date_debut = ?, date_fin = ?, est_disponible = ? WHERE id_activity = ?");
        try {
            $stmt->execute([$this->nom_activite, $this->description, $this->capacite, $this->date_debut, $this->date_fin, $this->est_disponible, $id_activity]);
            return "Activité mise à jour avec succès.";
        } catch (PDOException $e) {
            return "Erreur lors de la mise à jour de l'activité : " . $e->getMessage();
        }
    }

    
    public static function deleteActivity($id_activity) {
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("DELETE FROM activities WHERE id_activity = ?");
        try {
            $stmt->execute([$id_activity]);
            return "Activité supprimée avec succès.";
        } catch (PDOException $e) {
            return "Erreur lors de la suppression de l'activité : " . $e->getMessage();
        }
    }

    public static function isAvailable($id_activity) {
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT est_disponible FROM activities WHERE id_activity = ?");
        $stmt->execute([$id_activity]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['est_disponible'] : false;
    }
}

$activity = new Activity("Yoga", "Cours de yoga pour débutants", 20, "2025-01-01", "2025-02-01");
echo $activity->createActivity(); 

$activityDetails = Activity::getActivityById(1); 
print_r($activityDetails);

$activity->updateActivity(1); 
echo Activity::deleteActivity(1);
echo Activity::isAvailable(2) ? "Activité disponible" : "Activité non disponible";


?>