<?php
include('../Controle/voirpropositionA_ctrl.php');
?>
<link rel="stylesheet" href="../Publique/Css/voirproposition.css"> <!-- Assurez-vous que le chemin vers votre fichier CSS est correct -->
</head>
<body>
<?php include("../Modele/scriptproposition.php") ?>
<!-- La fenêtre modale -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="modal-content"></div>
    </div>
</div>

<?php if (isset($row)) : ?>
    <!-- Bouton "Voir le contenu" -->
    <button onclick="openModal('<?php echo addslashes($row['contenu']); ?>')">Voir le contenu</button>


    <form action="../Controle/traitement_valider_proposition.php" method="POST">
        <input type="hidden" name="id_proposition" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="titre_proposition" value="<?php echo htmlspecialchars($row['titre'], ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="contenu_proposition" value="<?php echo htmlspecialchars($row['contenu'], ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="ordre_proposition" value="<?php echo $row['Ordre']; ?>">
        <label for="categorie_proposition">Catégorie :</label>
        <input type="text" name="categorie_proposition" id="categorie_proposition" required>
        <input type="hidden" name="statut_proposition" value="valider"> <!-- Utilisez "valider" pour le bouton Valider -->
        <button type="submit">Valider</button> <!-- Texte du bouton : Valider -->
    </form>

    <form action="../Controle/traitement_valider_proposition.php" method="POST">
        <input type="hidden" name="id_proposition" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="titre_proposition" value="<?php echo htmlspecialchars($row['titre'], ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="contenu_proposition" value="<?php echo htmlspecialchars($row['contenu'], ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="ordre_proposition" value="<?php echo $row['Ordre']; ?>">
        <label for="categorie_proposition">Catégorie :</label>
        <input type="text" name="categorie_proposition" id="categorie_proposition" required>
        <input type="hidden" name="statut_proposition" value="archiver"> <!-- Utilisez "archiver" pour le bouton Archiver -->
        <button type="submit">Archiver</button> <!-- Texte du bouton : Archiver -->
    </form>
<?php endif; ?>
</body>
</html>
