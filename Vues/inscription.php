<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css"> <!-- Modifié pour le chemin vers le CSS -->
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>

        <?php
        session_start();
        // Vérifiez s'il y a des erreurs d'inscription dans la session
        if (isset($_SESSION['erreurs_inscription']) && !empty($_SESSION['erreurs_inscription'])) {
            echo '<div style="color: red;">';
            foreach ($_SESSION['erreurs_inscription'] as $erreur) {
                echo $erreur . '<br>';
            }
            echo '</div>';
            // Effacez les erreurs de la session après les avoir affichées
            unset($_SESSION['erreurs_inscription']);
        }
        ?>

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

            <br><br>
            <input type="submit" value="S'inscrire">
        </form>
        <p>Déjà un compte ? <a href="connexion.php">Connectez-vous ici</a>.</p>

        <!-- Lien vers la réinitialisation du mot de passe -->
        <p>Mot de passe oublié ? <a href="../Vues/reinitialisation.php">Réinitialiser le mot de passe</a></p> <!-- Modifié pour le chemin -->
    </div>

    <script>
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>
</html>
