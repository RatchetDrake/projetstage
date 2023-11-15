<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="../Publique/Css/style.css">
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>

       

        <form action="../Controle/inscription_ctrl.php" method="post"> <!-- Modifié pour le chemin vers le contrôleur -->
            <label for="pseudo">Pseudo :</label>
            <input type="text" id="pseudo" name="pseudo" required minlength="5"><br><br>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="login_motdepasse">Mot de passe :</label>
            <div class="password-input">
                <input type="password" id="login_motdepasse" name="login_motdepasse" required onpaste="return false">
                <span class="password-toggle" onclick="togglePassword('login_motdepasse')">👁️</span>
            </div>
            <br><br>

            <label for="confirm_motdepasse">Confirmez le mot de passe :</label>
            <div class="password-input">
                <input type="password" id="confirm_motdepasse" name="confirm_motdepasse" required onpaste="return false">
                <span class="password-toggle" onclick="togglePassword('confirm_motdepasse')">👁️</span>
            </div>
            <?php
       include('../Controle/erreurs_ctrl.php');
        ?>
            <br><br>
            <input type="submit" value="S'inscrire">
        
        </form>
        <p>Déjà un compte ? <a href="connexion.php">Connectez-vous ici</a>.</p>

        <!-- Lien vers la réinitialisation du mot de passe -->
        <p>Mot de passe oublié ? <a href="../Vues/reinitialisation.php">Réinitialiser le mot de passe</a></p> <!-- Modifié pour le chemin -->
    </div>

    <?php 
include('../Modele/script.php'); // Incluez le fichier script.php pour la fonction hide du mot de passe 
    ?>
</body>
</html>
