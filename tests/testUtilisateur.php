<?php
$activityController = new ActivityController();

echo $activityController->createActivity("Yoga", "Cours de yoga pour débutants", 20, "2025-01-01", "2025-02-01");

print_r($activityController->getActivityById(1));

echo $activityController->updateActivity(1, "Yoga Avancé", "Cours pour niveaux avancés", 15, "2025-02-01", "2025-03-01", true);

echo $activityController->deleteActivity(1);

echo $activityController->isActivityAvailable(2);


// hhhhhhhhhhhh
$admin = new Admin("Admin", "User", "admin@example.com", "0600000000", "password123");

echo $admin->deleteMember(2);

echo $admin->addActivity("Fitness", "Session d'entraînement intensif", 30, "2025-01-10", "2025-01-20");

echo $admin->updateActivity(1, "Yoga Avancé", "Cours pour avancés", 25, "2025-02-01", "2025-02-15");

echo $admin->deleteActivity(1);

echo $admin->manageReservations(1, "Confirmee");
// nnnnnnnnnnnnnnnnnnn
$reservationController = new ReservationController();

echo $reservationController->createReservation(1, 2);

print_r($reservationController->getReservationById(1));

print_r($reservationController->getReservationsByUser(1));

echo $reservationController->updateReservationStatus(1, 'Confirmee');

echo $reservationController->deleteReservation(1);
// jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj
