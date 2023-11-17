<?php
session_start(); // Assurez-vous d'inclure cette ligne au début de vos pages
$role = $_SESSION['role']; // Récupérez le rôle de l'utilisateur depuis la session

// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION['nom_utilisateur'])) {
    header("Location: ../Vues/connexion.php"); // Changer le chemin si nécessaire
    exit();
}

// Liste des pages autorisées pour chaque rôle
$pages_autorisees = array(
    1 => array('index.php', 'creationhistoire.php', 'creationhistoire_ctrl.php', 'explorerunivers.php', 'faq.php', 'forum.php'),
    2 => array('indexM.php', 'creationhistoireM.php', 'creationhistoire_ctrl.php','explorerunivers.php', 'faq.php', 'forumM.php'),
    3 => array('indexA.php', 'creationhistoireA.php', 'creationhistoire_ctrl.php','exploreruniversA.php', 'faq.php', 'forumA.php')
);

// Récupérez le nom de la page courante
$nom_page_courante = basename($_SERVER['PHP_SELF']);

// Vérifiez si la page courante est autorisée pour le rôle de l'utilisateur
if (!in_array($nom_page_courante, $pages_autorisees[$role])) {
    // L'utilisateur a tenté d'accéder à une page non autorisée
    // Vous pouvez afficher un message d'erreur ou effectuer d'autres actions
    echo "Accès non autorisé à cette page.";
    exit();
}
?>
