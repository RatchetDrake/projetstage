<?php
// Inclure ici le code de connexion à la base de données si ce n'est pas déjà fait
// include('../Modele/connexionBDD.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["ordre"]) && isset($_POST["statut"])) {
    $ordreHistoire = $_POST["ordre"];
    $nouveauStatut = $_POST["statut"];

    // Mettez en œuvre la logique de terminaison de l'histoire en fonction du statut "terminer"
    // Par exemple, vous pouvez mettre à jour le champ "statut" dans la base de données.

    // Assurez-vous d'ajouter la logique appropriée pour la terminaison de l'histoire en fonction de vos besoins.

    // Rediriger vers la page des archives ou une autre page appropriée après la terminaison
    header("Location: voir_archivesA.php"); // Rediriger vers la page des archives
    exit();
} else {
    // Si l'ordre de l'histoire ou le statut n'est pas défini, rediriger vers la page d'accueil ou une autre page appropriée
    header("Location: index.php"); // Rediriger vers la page d'accueil
    exit();
}
?>
