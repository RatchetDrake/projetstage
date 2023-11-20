<script>
    // Fonction pour remplir les étoiles jusqu'à une étoile spécifique
    function fillStars(starIndex, ratingElement) {
        for (let i = 0; i <= starIndex; i++) {
            ratingElement.children[i].textContent = '★'; // Remplacer ☆ par ★
        }
        for (let i = starIndex + 1; i < 5; i++) {
            ratingElement.children[i].textContent = '☆'; // Remplacer ★ par ☆
        }
    }

    // Écouteurs d'événements pour chaque système de notation
    for (let i = 1; i <= 6; i++) { // Boucle pour chaque histoire (ajustez le nombre)
        const ratingElement = document.getElementById(`rating-${i}`);
        const histoireIndex = i; // Sauvegarde de l'indice de l'histoire

        // Écouteur d'événement pour chaque étoile
        for (let starIndex = 0; starIndex < 5; starIndex++) {
            const star = ratingElement.children[starIndex];

            // Gestionnaire pour remplir les étoiles lorsqu'on passe dessus
            star.addEventListener("mouseenter", function () {
                fillStars(starIndex, ratingElement);
            });

            // Gestionnaire pour réinitialiser les étoiles lorsque le curseur quitte
            ratingElement.addEventListener("mouseleave", function () {
                // Remettre l'affichage des étoiles en fonction de la note actuelle (à implémenter côté serveur)
                // Vous devrez récupérer la note actuelle depuis la base de données et mettre à jour les étoiles en conséquence
                // Vous pouvez appeler ici une fonction pour récupérer la note actuelle depuis le serveur
                // Exemple de réinitialisation des étoiles ici (à adapter selon votre logique) :
                for (let j = 0; j < 5; j++) {
                    if (j < noteActuelle) {
                        ratingElement.children[j].textContent = '★';
                    } else {
                        ratingElement.children[j].textContent = '☆';
                    }
                }
            });

            // Gestionnaire de clic pour enregistrer la note
            star.addEventListener("click", function () {
                handleRatingClick(starIndex, histoireIndex); // Passer l'indice de l'histoire et de l'étoile
            });
        }
    }
</script>