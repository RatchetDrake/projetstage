<?php
session_start();

// Détruire complètement la session
session_unset();
session_destroy();

// Rediriger vers la page de connexion (ou autre page) après déconnexion
header("Location: ../Vues/connexion.php");
exit();
?>
