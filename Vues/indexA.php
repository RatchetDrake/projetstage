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

<!-- Contenu de votre page d'accueil -->
<h2>Bienvenue sur mon site web</h2>
<p>Ceci est la page d'accueil de mon site.</p>
<!-- Ajoutez le contenu de votre page ici -->

</div> <!-- Fermeture de la div "content" -->
</body>
</html>
