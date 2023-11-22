<?php
include('../Modele/connexionBDD.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données du formulaire
    $id = $_POST["id"];
    $titre = $_POST["titre"];
    $contenu = $_POST["contenu"];
    $nb_caracteres = $_POST["nb_caracteres"];
    $ordre = $_POST["ordre"];
    $nom_utilisateur = $_POST["nom_utilisateur"];

    // Préparez la requête SQL de mise à jour
    $sql = "UPDATE chapitre SET titre = :titre, contenu = :contenu, Nbcaracteres = :nb_caracteres, Ordre = :ordre, nom_utilisateur = :nom_utilisateur WHERE id = :id";
    $stmt = $connexion->prepare($sql);

    // Liez les paramètres
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
    $stmt->bindParam(':contenu', $contenu, PDO::PARAM_STR);
    $stmt->bindParam(':nb_caracteres', $nb_caracteres, PDO::PARAM_INT);
    $stmt->bindParam(':ordre', $ordre, PDO::PARAM_INT);
    $stmt->bindParam(':nom_utilisateur', $nom_utilisateur, PDO::PARAM_STR);

    // Exécutez la requête de mise à jour
    if ($stmt->execute()) {
        // La mise à jour a réussi
        header("Location: ../Vues/voir_propositionA.php"); // Redirigez l'utilisateur vers la page de liste des propositions
        exit;
    } else {
        // La mise à jour a échoué
        echo "Erreur lors de la mise à jour de la proposition.";
    }
} else {
    echo "Méthode de requête invalide.";
}
?>
