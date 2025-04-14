
# 🏡 Application Web de Gestion Immobilière

## 📌 Description du Projet

Ce projet est une application web de **gestion immobilière** développée dans le cadre de notre **projet de fin d’année**. L’objectif est de proposer une interface intuitive et fonctionnelle permettant à un propriétaire ou un gestionnaire de biens immobiliers de suivre l’état de ses locations, locataires, finances, et de centraliser la gestion locative en ligne.

Cette première version du projet marque le début du développement de notre plateforme. Elle se concentre sur les fonctionnalités essentielles pour la gestion quotidienne d’un parc immobilier.

---

## 🚀 Fonctionnalités Principales

- **Système d’authentification sécurisé** (connexion, redirection selon rôle à venir)
- **Tableau de bord des biens actifs et archivés**
- **Ajout et modification de biens immobiliers**
- **Ajout de locataires à un bien**
- **Archivage et restauration de lots**
- **Chatbot intégré** pour assistance rapide avec réponses automatisées
- **Pages d’aide pour guider les utilisateurs dans l’investissement**
- **Design responsive** pour une utilisation sur ordinateur, tablette et mobile

Des fonctionnalités supplémentaires sont prévues dans les prochaines étapes du développement, notamment :
- Gestion des paiements et quittances
- Statistiques financières
- Notifications automatiques
- Gestion multi-utilisateurs avec rôles

---

## ⚙️ Instructions d’Installation et d’Exécution

### 1. Prérequis

- Serveur local (comme XAMPP, WAMP ou MAMP)
- PHP ≥ 7.4
- MySQL ou MariaDB
- Navigateur moderne (Chrome, Firefox, etc.)

### 2. Installation

1. Cloner ou télécharger le projet dans le dossier `htdocs` (ou équivalent) de votre serveur local.
2. Importer le fichier `BDD.sql` (fourni dans le projet) dans **phpMyAdmin** pour créer la base de données.
3. Modifier le fichier `connexionBDD.php` avec vos identifiants de base de données.
   ```php
   $conn = new PDO("mysql:host=localhost;dbname=immobilier_db", "root", "");
   ```
4. Lancer le serveur Apache et MySQL.
5. Accéder au projet via :  
   `http://localhost/nom_du_projet/index.php`

### 3. Structure du projet

```
/index.php              → Page d’accueil
/CSS/                   → Feuilles de style
/img/                   → Images et icônes
/contactbull.php        → Chatbot interactif
/properties.php         → Liste des biens actifs
/archives.php           → Liste des biens archivés
/nouveau_lot.php        → Ajout d’un bien
/ajouter_locataire.php  → Ajout d’un locataire
...
```

---

## 👥 Membres du Groupe

- **Mouhamad Damen** – Développement back-end / base de données / Authentification / Sécurité / chatbot / rassemblé les pages (nettoyage des codes, réorganisation des fichiers/dossiers)
- **Zayd ZEGHIMI** – Page d'acceuil / Développement front-end / Page profile
- **Paul JEANNIN** – Pages de propriétés (avec l'archives etc..) / base de données
- **Arthur LOUF** – Front-end (un peu partout) / Pages de propriétés (avec l'archives etc..)

*Nous nous sommes aidé les uns les autres sur nos pages ces rôles et pages restes à titre indicatif😄*

---

## 📝 Remarques

Ce projet est en cours de développement. Certaines fonctionnalités sont encore en phase de test ou seront intégrées dans une prochaine version. L’objectif final est d’avoir une solution complète de gestion immobilière utilisable en environnement réel par des propriétaires ou des agences.

Merci de votre attention et bonne exploration !
