CREATE DATABASE fitness_V2;
USE fitness_V2;

CREATE TABLE `user` (
  `id_user` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL UNIQUE,
  `telephone` varchar(15) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `role` ENUM('admin', 'member') DEFAULT 'member'
);

INSERT INTO `user` (`nom`, `prenom`, `email`, `telephone`, `password`)
VALUES
('Moudiri', 'Abdeljabbar', 'moudiri@gmail.com', '0666666666', 'moudiri'),
('dadssi', 'mohamed', 'dadssi@gmail.com', '0666666666', 'dadssi'),
('salma', 'salamat', 'salma@gmail.com', '0666666666', 'salma'),
('chamkhi', 'mohamed', 'chamkhi@gmail.com', '0666666666', 'chamkhi'),
('majdi', 'mehdi', 'majdi@gmail.com', '0666666666', 'majdi');



CREATE TABLE `activities` (
  `id_activity` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `nom_activite` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `capacite` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `est_isponible` boolean DEFAULT true
) ;

INSERT INTO `activities` (`nom_Activite`, `description`, `capacite`, `date_debut`, `date_fin`)
VALUES
('Yoga Matinal', 'Une séance de yoga pour bien commencer la journée', 20, '2024-01-01', '2024-01-31'),
('Cours de Zumba', 'Des sessions dynamiques pour brûler des calories en dansant', 30, '2024-02-01', '2024-02-28'),
('Musculation Intense', 'Un programme pour développer la force musculaire', 15, '2024-03-01', '2024-03-31'),
('Méditation Guidée', 'Se détendre et réduire le stress grâce à la méditation', 25, '2024-04-01', '2024-04-30'),
('Natation Libre', 'Accès à la piscine pour nager librement', 10, '2024-05-01', '2024-05-31'),
('Cours de Boxe', 'Apprenez les bases de la boxe avec un coach professionnel', 12, '2024-06-01', '2024-06-30');

CREATE TABLE `reservations` (
  `ID_Reservation` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_activity` int(11) NOT NULL,
  `date_reservation` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` enum('Confirmee','Annulee', 'En attente') NOT NULL DEFAULT 'En attente',
  FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_activity) REFERENCES activities(id_activity) ON DELETE CASCADE ON UPDATE CASCADE 
);

INSERT INTO `reservations` (`id_user`, `id_activity`)
VALUES
(1, 5),
(2, 4),
(3, 3),
(4, 2),
(5, 1);
INSERT INTO `reservations` (`id_user`, `id_activity`)
VALUES
(3, 5);

-- 1.	Combien de réservations ont été confirmées dans le système ?
SELECT COUNT(*) FROM reservations WHERE statut = 'confirmee';

-- 2.	Quelle est la capacité moyenne des activités proposées ?

SELECT AVG(capacite) FROM activities;

-- 3.	Combien de membres distincts ont effectué au moins une réservation ?

SELECT COUNT(DISTINCT id_user) FROM reservations;

-- 4.	Quelles sont les trois activités les plus réservées ?

SELECT  DISTINCT a.nom_Activite as 'nom', COUNT(r.id_reservation) as 'totatR' FROM activities a JOIN reservations r on r.id_activity = a.id_activity
            GROUP BY nom ORDER BY  COUNT('totatR') DESC LIMIT 3;

-- 5.	Quel est le pourcentage des réservations annulées par rapport au total des réservations ?

SELECT 
    ((SELECT COUNT(*) FROM reservations WHERE statut = 'annulee') * 100.0 / COUNT(*)) AS pourcentage_annulations
FROM reservations;
