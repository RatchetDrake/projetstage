<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Votre Site</title>
    <link rel="stylesheet" type="text/css" href="../Publique/Css/style.css">
</head>
<body>
<nav>
    <div class="logo">
        <!-- Remplacez par votre image de logo ou du texte si vous n'en avez pas -->
        <img src="chemin_vers_votre_logo.png" alt="Logo">
    </div>
    <ul>
        <!-- Utilisez PHP pour changer les liens selon le rôle de l'utilisateur -->
        <li><a href="<?php echo ($role == 1) ? 'index.php' : (($role == 2) ? 'indexM.php' : 'indexA.php'); ?>">Accueil</a></li>
        <?php if ($role >= 1 && $role <= 3) { ?>
        <li><a href="<?php echo ($role == 1) ? 'creationhistoire.php' : (($role == 2) ? 'creationhistoireM.php' : 'creationhistoireA.php'); ?>">Créer une histoire</a></li>
        <?php } ?>
        <li><a href="<?php echo ($role == 1 || $role == 2) ? 'explorerunivers.php' : 'exploreruniversA.php'; ?>">Explorer Les Histoires</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="<?php echo ($role == 1) ? 'forum.php' : (($role == 2) ? 'forumM.php' : 'forumA.php'); ?>">Forum</a></li>
    </ul>
    <div class="user-info">
        <?php
        if (isset($_SESSION['nom_utilisateur'])) {
            echo 'Bienvenue, ' . htmlspecialchars($_SESSION['nom_utilisateur']);
        }
        ?>
    </div>
    <div class="deconnexion-button">
        <?php
        if (isset($_SESSION['nom_utilisateur'])) {
            echo '<a href="../Controle/deconnexion.php">Déconnexion</a>';
        }
        ?>
    </div>
</nav>

<!-- Le reste de la page HTML -->
<div id="content">
    <!-- Le contenu de votre page ira ici -->
</div>

</body>
</html>
