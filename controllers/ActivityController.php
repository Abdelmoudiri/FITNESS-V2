<?php
include_once "../models/Activity.php";

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
    
    public function getAllActivities() {
       $result =  Activity::getAllActivity();
        require_once("../public/home.php");
    }
    

    public function deleteActivity($id_activity) {
        return Activity::deleteActivity($id_activity);
    }

    public function isActivityAvailable($id_activity) {
        return Activity::isAvailable($id_activity) ? "Activité disponible." : "Activité non disponible.";
    }
}
?>
