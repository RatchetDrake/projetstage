<?php
include('../Modele/connexionBDD.php');

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    
    // Évitez les injections SQL en utilisant une requête préparée
    $sql = "DELETE FROM chapitre WHERE id = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(1, $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Proposition supprimée avec succès";
    } else {
        echo "Erreur lors de la suppression de la proposition";
    }
} else {
    echo "ID de proposition non spécifié";
}
?>
