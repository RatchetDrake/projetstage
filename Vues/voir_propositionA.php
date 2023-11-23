<?php
include('../Controle/voirpropositionA_ctrl.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Publique/Css/voirproposition.css"> <!-- Inclure le fichier CSS externe -->
</head>
<body>
<script>
    // Fonction pour ouvrir la fenêtre modale avec le contenu
    function openModal(content) {
        const modal = document.getElementById('myModal');
        const modalContent = document.getElementById('modal-content');
        modalContent.innerHTML = content;
        modal.style.display = 'block';
    }

    // Fonction pour fermer la fenêtre modale
    function closeModal() {
        const modal = document.getElementById('myModal');
        modal.style.display = 'none';
    }

    // Fermer la fenêtre modale lorsque l'utilisateur clique en dehors de la fenêtre modale
    window.onclick = function (event) {
        const modal = document.getElementById('myModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

    // Fonction pour supprimer une proposition
    function deleteProposition(id) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cette proposition ?")) {
            // Effectuez une requête AJAX pour supprimer la proposition de la base de données
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "../Controle/supprimerproposition_ctrl.php", true); // Créez un fichier PHP pour gérer la suppression
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Mettez à jour la page ou effectuez d'autres actions nécessaires
                    location.reload(); // Rechargez la page pour refléter les changements
                }
            };
            xhr.send("id=" + id);
        }
    }

    // Fonction pour ouvrir le formulaire de modification
    function editProposition(id) {
        // Redirigez l'utilisateur vers une page de modification avec l'ID de la proposition
        window.location.href = "../Controle/modifierproposition.php?id=" + id;
    }

    // Fonction pour archiver une proposition
    function archiveProposition(id) {
        if (confirm("Êtes-vous sûr de vouloir archiver cette proposition ?")) {
            // Effectuez une requête AJAX pour archiver la proposition de la base de données
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "../Controle/archiverproposition_ctrl.php", true); // Créez un fichier PHP pour gérer l'archivage
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Mettez à jour la page ou effectuez d'autres actions nécessaires
                    location.reload(); // Rechargez la page pour refléter les changements
                }
            };
            xhr.send("id=" + id);
        }
    }
</script>

<!-- La fenêtre modale -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="modal-content"></div>
    </div>
</div>

<?php if (isset($row)) : ?>
    <form action="../Controle/traitement_valider_proposition.php" method="POST">
    <input type="hidden" name="id_proposition" value="<?php echo $row['id']; ?>">
    <input type="hidden" name="titre_proposition" value="<?php echo $row['titre']; ?>">
    <input type="hidden" name="contenu_proposition" value="<?php echo $row['contenu']; ?>">
    <input type="hidden" name="ordre_proposition" value="<?php echo $row['Ordre']; ?>">
    <label for="categorie_proposition">Catégorie :</label>
    <input type="text" name="categorie_proposition" id="categorie_proposition" required>
    <input type="hidden" name="statut_proposition" value="valider"> <!-- Utilisez "valider" pour le bouton Valider -->
    <button type="submit">Valider</button> <!-- Texte du bouton : Valider -->
</form>

<form action="../Controle/traitement_valider_proposition.php" method="POST">
    <input type="hidden" name="id_proposition" value="<?php echo $row['id']; ?>">
    <input type="hidden" name="titre_proposition" value="<?php echo $row['titre']; ?>">
    <input type="hidden" name="contenu_proposition" value="<?php echo $row['contenu']; ?>">
    <input type="hidden" name="ordre_proposition" value="<?php echo $row['Ordre']; ?>">
    <label for="categorie_proposition">Catégorie :</label>
    <input type="text" name="categorie_proposition" id="categorie_proposition" required>
    <input type="hidden" name="statut_proposition" value="archiver"> <!-- Utilisez "archiver" pour le bouton Archiver -->
    <button type="submit">Archiver</button> <!-- Texte du bouton : Archiver -->
</form>
<?php endif; ?>
</body>
</html>
