<?php
include('../Modele/connexionBDD.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données de la proposition à valider
    $id_proposition = $_POST["id_proposition"];
    $titre_proposition = $_POST["titre_proposition"];
    $contenu_proposition = $_POST["contenu_proposition"];
    $ordre_proposition = $_POST["ordre_proposition"];
    $categorie_proposition = $_POST["categorie_proposition"];
    $statut_proposition = $_POST["statut_proposition"]; // Récupérez le statut (valider ou archiver)

    // Insérez les données dans la table histoire avec la catégorie spécifiée
    $sql = "INSERT INTO histoire (titre, description, univers, categorie, statut, datecreation) VALUES (:titre, :description, :univers, :categorie, :statut, NOW())";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':titre', $titre_proposition, PDO::PARAM_STR);
    $stmt->bindParam(':description', $contenu_proposition, PDO::PARAM_STR);
    $stmt->bindParam(':univers', $ordre_proposition, PDO::PARAM_STR);
    $stmt->bindParam(':categorie', $categorie_proposition, PDO::PARAM_STR);
    $stmt->bindParam(':statut', $statut_proposition, PDO::PARAM_STR); // Utilisez le statut spécifié

    if ($stmt->execute()) {
        // Supprimez la proposition de la table chapitre après validation si nécessaire
        $sql_supprimer_proposition = "DELETE FROM chapitre WHERE id = :id_proposition";
        $stmt_supprimer_proposition = $connexion->prepare($sql_supprimer_proposition);
        $stmt_supprimer_proposition->bindParam(':id_proposition', $id_proposition, PDO::PARAM_INT);
        $stmt_supprimer_proposition->execute();

        header("Location: ../Vues/voir_propositionA.php"); // Redirigez l'utilisateur vers la page de liste des propositions
        exit;
    } else {
        echo "Erreur lors de la validation de la proposition.";
    }
} else {
    echo "Méthode de requête invalide.";
}

?>
