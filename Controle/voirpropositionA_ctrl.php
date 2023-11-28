<?php
include('autorisation_ctrl.php');
include('../Modele/nav.php');
include('../Modele/connexionBDD.php');
include('../Modele/header.php');
// Exécuter la requête SQL pour sélectionner tous les chapitres
$sql = "SELECT * FROM chapitre";
$result = $connexion->query($sql);

if ($result && $result->rowCount() > 0) {
    // Afficher le tableau HTML
    echo "<!DOCTYPE html>";
    echo "<html lang=\"fr\">";
    echo "<head>";
    echo "<meta charset=\"UTF-8\">";
    echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
    echo "<title>Liste des Chapitres</title>";
    echo "</head>";
    echo "<body>";
    echo "<h1>Liste des Chapitres</h1>";
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Titre</th>";
    echo "<th>Contenu</th>";
    echo "<th>Nombre de Caractères</th>";
    echo "<th>Ordre</th>";
    echo "<th>Nom de l'Utilisateur</th>";
    echo "</tr>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["titre"] . "</td>";
        echo "<td>";
        echo "<button onclick='editProposition(" . $row["id"] . ")'>Modifier</button>"; // Bouton Modifier
        echo "<button onclick='deleteProposition(" . $row["id"] . ")'>Supprimer</button>"; // Bouton Supprimer
        echo "</td>";
        echo "<td>" . $row["Nbcaracteres"] . "</td>";
        echo "<td>" . $row["Ordre"] . "</td>";
        echo "<td>" . $row["nom_utilisateur"] . "</td>";
        echo "</tr>";
    }
    
    
    
    
    
    // Code PHP de suppression
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
    }
    
    

    echo "</table>";
    echo "</body>";
    echo "</html>";
} else {
    echo "Aucun chapitre trouvé dans la base de données.";
}
?>