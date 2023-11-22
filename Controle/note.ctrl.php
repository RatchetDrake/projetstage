<?php
include('autorisation_ctrl.php');
include('../Modele/nav.php');
include('../Modele/connexionBDD.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire pour la note
    $note = $_POST['note']; // La note attribuée par l'utilisateur
    $ordre = $_POST['ordre']; // L'ordre de l'histoire notée

    // Récupérer le nom d'utilisateur pour la note
    $nomUtilisateur = $_SESSION['nom_utilisateur'];

    // Vérifier si l'utilisateur a déjà noté cette histoire
    $requeteVerification = $connexion->prepare("SELECT COUNT(*) FROM note WHERE nom_utilisateur = :nomUtilisateur AND Ordre = :ordre");
    $requeteVerification->bindParam(':nomUtilisateur', $nomUtilisateur, PDO::PARAM_STR);
    $requeteVerification->bindParam(':ordre', $ordre, PDO::PARAM_INT);
    $requeteVerification->execute();

    $nombreNotesExistantes = $requeteVerification->fetchColumn();

    if ($nombreNotesExistantes > 0) {
        // L'utilisateur a déjà noté cette histoire, stockez un message d'erreur.
        $_SESSION['erreur_message'] = 'Vous avez déjà noté cette histoire.';
    } else {
        try {
            $connexion->beginTransaction(); // Début de la transaction

            // Préparer la requête SQL pour insérer la note dans la table `note`
            $requeteNote = $connexion->prepare("INSERT INTO note (Valeur, nom_utilisateur, Ordre) VALUES (:note, :nomUtilisateur, :ordre)");
            $requeteNote->bindParam(':note', $note, PDO::PARAM_INT);
            $requeteNote->bindParam(':nomUtilisateur', $nomUtilisateur, PDO::PARAM_STR);
            $requeteNote->bindParam(':ordre', $ordre, PDO::PARAM_INT);

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
                $_SESSION['succes_message'] = 'Note enregistrée avec succès !';
            }
        } catch (PDOException $e) {
            // En cas d'erreur, répondre avec un message d'erreur
            $connexion->rollBack(); // Annulation de la transaction en cas d'erreur
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    // Rediriger l'utilisateur vers la page précédente avec les messages de succès ou d'erreur
    if (isset($_SERVER['HTTP_REFERER'])) {
        if (isset($_SESSION['succes_message'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '?succes=' . urlencode($_SESSION['succes_message']));
        } elseif (isset($_SESSION['erreur_message'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '?erreur=' . urlencode($_SESSION['erreur_message']));
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        exit; // Arrêter le script après la redirection
    }
}
?>
