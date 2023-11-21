<script>
<?php

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
?>
</script>