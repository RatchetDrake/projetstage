<?php
session_start();

include('../Modele/connexionBDD.php'); // Inclure le fichier de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = $_POST['login_identifier'];
    $motdepasse = $_POST['login_motdepasse'];

    // Requête SQL pour vérifier les informations de connexion (using email or pseudo)
    $sql = "SELECT * FROM Utilisateur WHERE email = :identifier OR nom_utilisateur = :identifier";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':identifier', $identifier);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultat && password_verify($motdepasse, $resultat['motdepasse'])) {
        // Connexion réussie, stockez le nom d'utilisateur et le rôle dans la session
        $_SESSION['nom_utilisateur'] = $resultat['nom_utilisateur'];
        $_SESSION['role'] = $resultat['role'];

        // Redirection en fonction du rôle de l'utilisateur
        if ($resultat['role'] == 1) {
            header("Location: ../Vues/index.php");
        } elseif ($resultat['role'] == 2) {
            header("Location: ../Vues/indexM.php");
        } elseif ($resultat['role'] == 3) {
            header("Location: ../Vues/indexA.php");
        }
        exit();
    } else {
        $_SESSION['erreur'] = "La connexion a échoué. Veuillez vérifier vos informations d'identification.";
        header("Location: ../Vues/connexion.php");
        exit();
    }
}
?>
