<!DOCTYPE html>
<html>
<head>
    <title>Réinitialisation du mot de passe</title>
    <link rel="stylesheet" type="text/css" href="chemin_vers_votre_css.css"> <!-- Ajoutez le chemin vers votre fichier CSS ici -->
</head>
<body>
    <h2>Réinitialisation du mot de passe</h2>
    <form action="../Controle/reinitialisation_ctrl.php" method="post">
        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Réinitialiser le mot de passe">
    </form>
</body>
</html>
