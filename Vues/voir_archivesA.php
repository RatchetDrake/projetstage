<?php
session_start(); // Assurez-vous d'inclure cette ligne au début de vos pages
$role = $_SESSION['role']; // Récupérez le rôle de l'utilisateur depuis la session
include('../Modele/nav.php'); // Incluez le fichier nav.php


// Vérifier si l'utilisateur est connecté, sinon le rediriger vers la page de connexion
if (!isset($_SESSION['nom_utilisateur'])) {
    header("Location: connexion.php");
    exit();
}

include('../Modele/header.php');
?>