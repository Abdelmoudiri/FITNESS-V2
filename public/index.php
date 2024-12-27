<?php

// include_once "../models/Admin.php";
// include_once "../models/Reservation.php";
// include_once "../models/Activity.php";
// include_once "../models/Member.php";
include_once "../controllers/ActivityController.php";
echo "getAllActivities";
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    switch ($action) {
        case 'getAllActivities':
            $controllerActivity = new ActivityController();
            $result=$controllerActivity->getAllActivities();
            break;
        
        default:
            echo "Action non reconnue.";
            break;
    }
} else {
    echo "Aucune action spécifiée.";
}
?>
