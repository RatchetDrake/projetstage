<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css"> <!-- Adapté pour le dossier CSS -->
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>

        <!-- Affichage du message d'erreur d'inactivité s'il existe -->
        <?php
        session_start();
        if (isset($_SESSION['erreur_inactivite'])) {
            echo '<div class="error-message">' . $_SESSION['erreur_inactivite'] . '</div>';
            unset($_SESSION['erreur_inactivite']);  // Effacer le message après l'affichage
        }
        ?>

        <form action="../Controle/connexion_ctrl.php" method="post"> <!-- Adapté pour le dossier Controle -->
            <label for="login_identifier">Email ou Pseudo:</label>
            <input type="text" id="login_identifier" name="login_identifier" required><br><br>

            <label for="login_motdepasse">Mot de passe :</label>
            <div class="password-input">
                <input type="password" id="login_motdepasse" name="login_motdepasse" required>
                <span class="password-toggle" onclick="togglePassword('login_motdepasse')">👁️</span>
            </div>

            <!-- Déplacement du message d'erreur/réussite et centrage -->
            <div class="message">
                <?php
                if (isset($_SESSION['erreur']) && !empty($_SESSION['erreur'])) {
                    echo '<div class="div-erreur">' . $_SESSION['erreur'] . '</div>';
                    unset($_SESSION['erreur']);
                }
                ?>
            </div>

            <br>

            <input type="submit" value="Se connecter">
        </form>

        <!-- Lien pour la réinitialisation du mot de passe -->
        <p><a href="../Vues/reinitialisation.php">Mot de passe oublié ? Réinitialisez-le ici</a></p>

        <p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous ici</a>.</p>
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

        window.addEventListener('beforeunload', function (event) {
            // Envoyer une requête à deconnexion.php pour indiquer la fermeture de la page
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../Modele/deconnexion.php', false); // Adapté pour le dossier Modele
            xhr.send();
        });
    </script>
</body>
</html>
