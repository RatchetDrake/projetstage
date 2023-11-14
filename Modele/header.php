<!DOCTYPE html>
<html>
<head>
    <title>Mon Site Web</title>
    <link rel="stylesheet" type="text/css" href="chemin_vers_votre_css.css"> <!-- Ajoutez le chemin vers votre fichier CSS ici -->
</head>
<body>
    <header>
        <h1>Mon Site Web</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <!-- Ajoutez d'autres liens de navigation ici -->
                <?php
                if (isset($_SESSION['nom_utilisateur'])) {
                    echo '<li>Bienvenue, ' . $_SESSION['nom_utilisateur'] . '</li>';
                    echo '<li><a href="../Controle/deconnexion.php">Déconnexion</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
    <div class="content">
