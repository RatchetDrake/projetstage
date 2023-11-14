<?php
// Inclure le fichier de connexion à la base de données
require_once('../Modele/connexionBDD.php');

// Créer un tableau pour stocker les messages d'erreur
$erreurs = array();

// Fonction pour valider la complexité du mot de passe
function est_motdepasse_valide($motdepasse) {
    // Vérifie que le mot de passe a entre 8 et 20 caractères
    if (strlen($motdepasse) < 8 || strlen($motdepasse) > 20) {
        return false;
    }

    // Vérifie la présence de caractères spéciaux
    if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $motdepasse)) {
        return false;
    }

    // Vérifie la présence de minuscules, majuscules et chiffres
    if (!preg_match('/[a-z]/', $motdepasse) || 
        !preg_match('/[A-Z]/', $motdepasse) || 
        !preg_match('/[0-9]/', $motdepasse)) {
        return false;
    }

    return true;
}

// Fonction pour valider le domaine de l'adresse email
function est_domaine_valide($email) {
    $domaines_valides = array(
        'gmail.com', 
        'outlook.com', 
        'yahoo.com',
        'hotmail.com',
        'hotmail.fr',
        'aol.com',
        'icloud.com',
        'protonmail.com',
        'mail.com',
        'zoho.com',
        'yandex.com',
        'live.com',
        'live.fr',
        'gmx.com',
        'inbox.com',
        'me.com',
        'fastmail.com',
        'disroot.org',
        'tutanota.com',
        'riseup.net'
        // Ajoutez d'autres domaines au besoin
    );
    $email_parts = explode('@', $email);
    $domaine = end($email_parts);
    return in_array($domaine, $domaines_valides);
}

// Paramètres de redirection après l'inscription réussie
$redirect_url = "../Vues/index.php"; 
// Initialiser la variable pour stocker les messages d'erreur
$erreur = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $motdepasse = $_POST['login_motdepasse'];
    $confirm_motdepasse = $_POST['confirm_motdepasse'];

    // Vérifier que le pseudo a au moins 5 caractères
    if (strlen($pseudo) < 5) {
        $erreurs[] = "Le pseudo doit avoir au moins 5 caractères.";
    }

    // Vérifier que les mots de passe correspondent
    if ($motdepasse !== $confirm_motdepasse) {
        $erreurs[] = "Les mots de passe ne correspondent pas.";
    }

    // Vérifier la complexité du mot de passe
    if (!est_motdepasse_valide($motdepasse)) {
        $erreurs[] = "Le mot de passe doit avoir entre 8 et 20 caractères, avec au moins une minuscule, une majuscule, un chiffre et un caractère spécial.";
    }

    // Vérifier l'unicité du pseudo et de l'adresse e-mail
    $stmt = $connexion->prepare("SELECT * FROM utilisateur WHERE nom_utilisateur = ? OR email = ?");
    $stmt->execute([$pseudo, $email]);
    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultat as $row) {
        if ($row['nom_utilisateur'] === $pseudo) {
            $erreurs[] = "Le pseudo est déjà utilisé. Veuillez en choisir un autre.";
        }
        if ($row['email'] === $email) {
            $erreurs[] = "L'adresse e-mail est déjà utilisée. Veuillez en choisir une autre.";
        }
    }

    // Vérifier le domaine de l'adresse e-mail
    if (!est_domaine_valide($email)) {
        $erreurs[] = "L'adresse e-mail n'est pas valide.";
    }

    // Si des erreurs sont survenues, stockez-les dans une variable de session
    if (!empty($erreurs)) {
        $_SESSION['erreurs_inscription'] = $erreurs;
        header("Location: ../Vues/inscription.php");
        exit();
    } else {
        // Aucune erreur, procédez à l'inscription
        // Hash du mot de passe
        $motdepasse_hache = password_hash($motdepasse, PASSWORD_DEFAULT);

        // Date de création au format MySQL
        $date_creation = date('Y-m-d H:i:s');

        // Requête SQL préparée pour insérer les données dans la table 'utilisateur'
        $stmt = $connexion->prepare("INSERT INTO utilisateur (nom_utilisateur, email, motdepasse, role, statut, datecreation) VALUES (?, ?, ?, 1, 1, ?)");

        if (!$stmt) {
            echo "Erreur de préparation de la requête : " . $connexion->errorInfo()[2];
        } else {
            $resultat = $stmt->execute([$pseudo, $email, $motdepasse_hache, $date_creation]);

            if (!$resultat) {
                echo "Erreur lors de l'exécution de la requête : " . $stmt->errorInfo()[2];
            } else {
                // Inscription réussie, stocker le pseudo dans la session
                $_SESSION['nom_utilisateur'] = $pseudo;
                header("Location: $redirect_url");
                exit();
            }
        }
    }
}
?>
