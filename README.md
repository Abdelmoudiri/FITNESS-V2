# FITNESS-V2

Une application de gestion de club de fitness permettant aux membres de réserver des activités et aux administrateurs de gérer les réservations et les membres.

## 📋 Table des matières
- [Aperçu](#aperçu)
- [Fonctionnalités](#fonctionnalités)
- [Technologies utilisées](#technologies-utilisées)
- [Structure du projet](#structure-du-projet)
- [Installation](#installation)
- [Configuration](#configuration)
- [Utilisation](#utilisation)
- [Tests](#tests)
- [Auteurs](#auteurs)

## 🎯 Aperçu

FITNESS-V2 est une application web PHP orientée objet qui permet la gestion complète d'un club de fitness. Elle implémente un système de réservation d'activités avec différents niveaux d'accès pour les membres et les administrateurs.

## ✨ Fonctionnalités

### Pour les membres
- Création et gestion de compte
- Consultation des activités disponibles
- Réservation et annulation d'activités
- Visualisation de l'historique des réservations

### Pour les administrateurs
- Gestion complète des membres
- Supervision des réservations
- Gestion des activités (CRUD)
- Tableau de bord analytique

## 🛠 Technologies utilisées

- PHP 8.x (POO)
- MySQL/MariaDB
- HTML5/CSS-Tailwind
- JavaScript
- PDO pour les interactions avec la base de données
- Architecture MVC

## 📁 Structure du projet

```
FITNESS-V2/
├── config/
│   ├── config.php         # Configuration globale
│   └── database.php       # Configuration de la base de données
├── controllers/           # Contrôleurs de l'application
├── files/
│   └── db.sql            # Script de création de la base de données
├── includes/             # Éléments réutilisables
├── models/               # Modèles de données
├── public/              
│   ├── assets/           # Ressources statiques
│   ├── home.php          # Page d'accueil
│   ├── index.php         # Point d'entrée
│   └── router.php        # Routeur de l'application
├── tests/                # Tests unitaires
└── views/                # Vues de l'application
```

## ⚙️ Installation

1. Cloner le repository :
```bash
git clone https://github.com/Abdelmoudiri/FITNESS-V2
cd FITNESS-V2
```

2. Créer la base de données :
```bash
mysql -u root -p < files/db.sql
```

3. Configurer l'application :
   - Copier `config/config.example.php` vers `config/config.php`
   - Modifier les paramètres de connexion à la base de données dans `config/config.php`

4. Configurer le serveur web :
   - Pointer le DocumentRoot vers le dossier `public/`
   - Activer le module de réécriture d'URL (mod_rewrite)


## 📘 Utilisation

### Accès membre
1. Créer un compte depuis la page d'inscription
2. Se connecter avec ses identifiants
3. Accéder au tableau de bord membre
4. Gérer ses réservations

### Accès administrateur
1. Se connecter avec les identifiants administrateur
2. Accéder au tableau de bord administrateur
3. Gérer les membres, activités et réservations

## 🧪 Tests 

Pour exécuter les tests unitaires :

```bash
php tests/testUtilisateur.php
```

## 👥 Auteurs

- [Votre nom](https://github.com/Abdelmoudiri)
- [Nom du coéquipier](https://github.com/Dadssi)
