<?php
include('autorisation_ctrl.php');
include('../Modele/nav.php');
include('../Modele/connexionBDD.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire pour la proposition
    $proposition = $_POST['proposition'];
    $titre = $_POST['titre'];
    $ordre = $_POST['ordre'];

    // Récupérer le nom d'utilisateur pour la proposition
    $nomUtilisateur = $_SESSION['nom_utilisateur'];

    // Calculer le nombre de caractères dans la proposition
    $nbCaracteres = strlen($proposition);

    try {
        $connexion->beginTransaction(); // Début de la transaction

        // Préparer la requête SQL pour insérer la proposition dans la table `chapitre`
        $requete = $connexion->prepare("INSERT INTO chapitre (titre, contenu, Nbcaracteres, Ordre, nom_utilisateur) VALUES (:titre, :proposition, :nbCaracteres, :ordre, :nomUtilisateur)");
        $requete->bindParam(':titre', $titre, PDO::PARAM_STR);
        $requete->bindParam(':proposition', $proposition, PDO::PARAM_STR);
        $requete->bindParam(':nbCaracteres', $nbCaracteres, PDO::PARAM_INT);
        $requete->bindParam(':ordre', $ordre, PDO::PARAM_INT);
        $requete->bindParam(':nomUtilisateur', $nomUtilisateur, PDO::PARAM_STR);

        // Exécuter la requête pour enregistrer la proposition
        $resultat = $requete->execute();

        // Vérifier les erreurs de la requête
        if (!$resultat) {
            $connexion->rollBack(); // Annulation de la transaction en cas d'erreur
            $erreurs = $requete->errorInfo();
            echo "Erreur lors de l'enregistrement de la proposition : " . $erreurs[2];
        } else {
            // Récupérer l'ID de la proposition insérée
            $proposition_id = $connexion->lastInsertId();

            // Récupérer les données du formulaire pour la note
            $note = $_POST['note']; // La note attribuée par l'utilisateur
            $histoire_id = $_POST['histoire_id']; // L'identifiant de l'histoire notée

            // Préparer la requête SQL pour insérer la note dans la table `note`
            $requeteNote = $connexion->prepare("INSERT INTO note (Valeur, nom_utilisateur, Histoire_ID) VALUES (:note, :nomUtilisateur, :histoire_id)");
            $requeteNote->bindParam(':note', $note, PDO::PARAM_INT);
            $requeteNote->bindParam(':nomUtilisateur', $nomUtilisateur, PDO::PARAM_STR);
            $requeteNote->bindParam(':histoire_id', $histoire_id, PDO::PARAM_INT);

            // Exécuter la requête pour enregistrer la note
            $resultatNote = $requeteNote->execute();

            // Vérifier les erreurs de la requête de la note
            if (!$resultatNote) {
                $connexion->rollBack(); // Annulation de la transaction en cas d'erreur
                $erreursNote = $requeteNote->errorInfo();
                echo "Erreur lors de l'enregistrement de la note : " . $erreursNote[2];
            } else {
                $connexion->commit(); // Validation de la transaction
                // Répondre avec un succès pour la note
                echo 'Proposition et note enregistrées avec succès !';
            }
        }
    } catch (PDOException $e) {
        // En cas d'erreur, répondre avec un message d'erreur
        $connexion->rollBack(); // Annulation de la transaction en cas d'erreur
        echo 'Erreur : ' . $e->getMessage();
    }
}
try {
    // Requête SQL pour récupérer les descriptions des histoires validées
    $query = "SELECT titre, description FROM histoire WHERE statut = 'Valide'";
    $result = $connexion->query($query);

    // Vérification des résultats
    if ($result) {
        $descriptions = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "Erreur lors de la récupération des descriptions : " . $connexion->errorInfo()[2];
        $descriptions = array(); // Initialisation en cas d'erreur
    }
} catch (PDOException $e) {
    echo "Erreur PDO : " . $e->getMessage();
    $descriptions = array(); // Initialisation en cas d'erreur
}
?>
