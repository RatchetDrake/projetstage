<?php
        session_start(); // Démarrage de la session
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="../Publique/Css/style.css"> <!-- Adapté pour le dossier CSS -->
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>

      

        <form action="../Controle/connexion_ctrl.php" method="post"> <!-- Adapté pour le dossier Controle -->
            <label for="login_identifier">Email ou Pseudo:</label>
            <input type="text" id="login_identifier" name="login_identifier" required><br><br>

            <label for="login_motdepasse">Mot de passe :</label>
            <div class="password-input">
                <input type="password" id="login_motdepasse" name="login_motdepasse" required>
                <span class="password-toggle" onclick="togglePassword('login_motdepasse')">👁️</span>
            </div>

            <br>

            <input type="submit" value="Se connecter">
            <?php include('../Controle/erreurs_ctrl.php'); ?>
        </form>

        <!-- Lien pour la réinitialisation du mot de passe -->
        <p><a href="../Vues/reinitialisation.php">Mot de passe oublié ? Réinitialisez-le ici</a></p>

        <p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous ici</a>.</p>
    </div>

    <?php include('../Modele/script.php'); // Incluez le fichier script.php pour la fonction hide du mot de passe ?>
</body>
</html>
