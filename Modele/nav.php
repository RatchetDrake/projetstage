<nav>
    <div class="logo">
        <!-- Ajoutez ici le logo -->
    </div>
    <ul>
        <li><a href="<?php echo ($role == 1) ? 'index.php' : (($role == 2) ? 'indexM.php' : 'indexA.php'); ?>">Accueil</a></li>
        <?php if ($role == 1 || $role == 2 || $role == 3) { ?>
        <li><a href="<?php echo ($role == 1) ? 'creationhistoire.php' : (($role == 2) ? 'creationhistoireM.php' : 'creationhistoireA.php'); ?>">Créer une histoire</a></li>
        <?php } ?>
    </ul>
</nav>
