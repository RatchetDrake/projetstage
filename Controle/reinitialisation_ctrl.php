<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Ici, vous pouvez ajouter la logique pour générer et envoyer un lien de réinitialisation de mot de passe par e-mail
    // Une fois le lien envoyé, vous pouvez rediriger l'utilisateur vers une page de confirmation.
    // Vous devrez également gérer la logique de réinitialisation du mot de passe.

    // Rediriger l'utilisateur vers une page de confirmation
    header("Location: ../Vues/confirmation_reinitialisation.php");
    exit();
}
?>
