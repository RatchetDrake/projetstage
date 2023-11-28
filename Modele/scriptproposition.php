<script>
    // Fonction pour ouvrir la fenêtre modale avec le contenu
    function openModal(content) {
        const modal = document.getElementById('myModal');
        const modalContent = document.getElementById('modal-content');

        // Échappez le contenu pour éviter les problèmes liés aux caractères spéciaux
        modalContent.innerHTML = content ? content : '';

        // Ajustez la hauteur de la fenêtre modale en fonction de la taille du contenu
        modal.style.display = 'block';
        modalContent.style.height = (modalContent.scrollHeight + 20) + 'px'; // Ajustez 20 pixels pour la marge
    }

    // Fonction pour fermer la fenêtre modale
    function closeModal() {
        const modal = document.getElementById('myModal');
        modal.style.display = 'none';
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
</script>
