<?php
include "../models/Activity.php";

class ActivityController {

    public function createActivity($nom_activite, $description, $capacite, $date_debut, $date_fin, $est_disponible = true) {
        $activity = new Activity($nom_activite, $description, $capacite, $date_debut, $date_fin, $est_disponible);
        return $activity->createActivity();
    }

    public function getActivityById($id_activity) {
        $activityDetails = Activity::getActivityById($id_activity);
        if ($activityDetails) {
            return $activityDetails;
        } else {
            return "Activité introuvable.";
        }
    }

    public function updateActivity($id_activity, $nom_activite, $description, $capacite, $date_debut, $date_fin, $est_disponible) {
        $activity = new Activity($nom_activite, $description, $capacite, $date_debut, $date_fin, $est_disponible);
        return $activity->updateActivity($id_activity);
    }

    public function deleteActivity($id_activity) {
        return Activity::deleteActivity($id_activity);
    }

    public function isActivityAvailable($id_activity) {
        return Activity::isAvailable($id_activity) ? "Activité disponible." : "Activité non disponible.";
    }
}


$activityController = new ActivityController();

echo $activityController->createActivity("Yoga", "Cours de yoga pour débutants", 20, "2025-01-01", "2025-02-01");

print_r($activityController->getActivityById(1));

echo $activityController->updateActivity(1, "Yoga Avancé", "Cours pour niveaux avancés", 15, "2025-02-01", "2025-03-01", true);

echo $activityController->deleteActivity(1);

echo $activityController->isActivityAvailable(2);
?>
