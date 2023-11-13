<?php
// Paramètres de connexion à la base de données
$serveur = "localhost";
$utilisateur = "RatchetDrake";
$motdepasse_bd = "Azerty";
$nomBaseDeDonnees = "projetstage"; // Utilisez le nom correct de votre base de données

try {
    // Connexion à la base de données avec PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motdepasse_bd);
    // Configure PDO to throw exceptions on error
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué : " . $e->getMessage());
}
?>
