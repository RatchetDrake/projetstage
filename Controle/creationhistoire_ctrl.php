<?php
include('autorisation_ctrl.php');
include('../Modele/nav.php');
include('../Modele/connexionBDD.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $proposition = $_POST['proposition'];
    $titre = $_POST['titre'];
    $ordre = $_POST['ordre'];

    // Récupérer le nom d'utilisateur (vous devez remplacer 'nom_utilisateur' par la manière dont vous récupérez le nom d'utilisateur)
    $nomUtilisateur = $_SESSION['nom_utilisateur']; // Par exemple, si vous l'avez stocké dans une session

    // Calculer le nombre de caractères dans la proposition
    $nbCaracteres = strlen($proposition);

    try {
        // Préparer la requête SQL pour insérer la proposition dans la table `chapitre`
        $requete = $connexion->prepare("INSERT INTO chapitre (titre, contenu, Nbcaracteres, Ordre, nom_utilisateur) VALUES (:titre, :proposition, :nbCaracteres, :ordre, :nomUtilisateur)");
        $requete->bindParam(':titre', $titre, PDO::PARAM_STR);
        $requete->bindParam(':proposition', $proposition, PDO::PARAM_STR);
        $requete->bindParam(':nbCaracteres', $nbCaracteres, PDO::PARAM_INT); // Utilisez PDO::PARAM_INT pour les valeurs numériques
        $requete->bindParam(':ordre', $ordre, PDO::PARAM_INT);
        $requete->bindParam(':nomUtilisateur', $nomUtilisateur, PDO::PARAM_STR);

        // Exécuter la requête
        $resultat = $requete->execute();

        // Vérifier les erreurs de la requête
        if (!$resultat) {
            $erreurs = $requete->errorInfo();
            echo "Erreur lors de l'exécution de la requête : " . $erreurs[2];
        } else {
            // Répondre avec un succès
            echo 'Proposition enregistrée avec succès !';
        }
    } catch (PDOException $e) {
        // En cas d'erreur, répondre avec un message d'erreur
        echo 'Erreur lors de l\'enregistrement de la proposition : ' . $e->getMessage();
    }
}
?>
