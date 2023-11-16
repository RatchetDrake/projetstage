<script>
// Tableau avec le texte complet de chaque histoire
const histoires = [
    // Histoire 1
    `
    Dans un monde en proie aux ténèbres et à la magie, les Chroniques de l'Épée Perdue débutent dans la Cité d'Émeraude, une métropole étincelante où se croisent des marchands rusés, des mages érudits, et des guerriers légendaires. Au cœur de cette cité, l'histoire prend vie avec une rumeur grandissante : l'Épée Perdue, une relique d'une puissance incommensurable, a été dérobée du musée royal. Cette épée, autrefois portée par un héros légendaire, est capable de décider du sort du monde, qu'il soit baigné dans la lumière ou englouti dans les ténèbres.
    Vous êtes des âmes hétéroclites, chacune portant son propre fardeau, et vous avez été attirées par l'appel de cette quête épique. Vous vous trouvez au marché central de la Cité d'Émeraude lorsque vous êtes abordées par un étranger mystérieux, un homme d'âge mûr portant une longue cape sombre. Il se présente comme Alaric, un érudit renommé en quête de héros pour retrouver l'Épée Perdue.
    Alaric prétend détenir des informations cruciales sur le vol de l'épée, des informations qu'il ne peut partager qu'avec vous. La confiance règne en maître dans ses yeux, et l'urgence de la situation est palpable. Il vous invite à le suivre vers une ruelle obscure, où il dévoile une énigme liée à des runes anciennes trouvées près de l'autel d'un dieu oublié...`,
    // Histoire 2
    `
    L'Ascension des Royaumes Obscurs
    Texte de l'histoire 2 ici...`,
    // Histoire 3
    `
    Les Secrets de la Cité Éternelle
    Texte de l'histoire 3 ici...`,
    // Histoire 4
    `
    Le Destin des Héros Oubliés
    Texte de l'histoire 4 ici...`,
    // Histoire 5
    `
    L'Ombre de la Prophétie
    Texte de l'histoire 5 ici...`,
    // Histoire 6
    `
    Les Terres de la Magie Déchue
    Texte de l'histoire 6 ici...`,
];

// Fonction pour afficher le texte de l'histoire
function afficherTexteHistoire(numero) {
    const histoireTexte = document.getElementById('histoire-texte');
    const titreHistoire = document.querySelector('.metadata .chroniques-epée-perdue');
    histoireTexte.querySelector('h2').textContent = titreHistoire.textContent;
    histoireTexte.querySelector('p').textContent = histoires[numero - 1];
}

// Ajoutez un gestionnaire d'événements aux cellules d'histoire
for (let i = 1; i <= 6; i++) {
    const histoireCell = document.getElementById('histoire-' + i);
    histoireCell.addEventListener('click', function() {
        afficherTexteHistoire(i);
    });
}

// Gestionnaire pour la soumission du formulaire de proposition
document.getElementById('proposer-suite').addEventListener('submit', function(e) {
    e.preventDefault(); // Empêcher la soumission par défaut du formulaire
    const titre = document.getElementById('titre-histoire').value;
    const ordre = document.getElementById('ordre').value;
    const textePropose = document.getElementById('suite-histoire').value;

    // Envoyer la proposition à la base de données via une requête AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controle/creationhistoire_ctrl.php'); // Assurez-vous que le chemin est correct
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // La proposition a été enregistrée avec succès
            alert('Proposition enregistrée avec succès !');
        }
    };
    
    // Envoyer les données au serveur PHP
    xhr.send('titre=' + encodeURIComponent(titre) + '&ordre=' + encodeURIComponent(ordre) + '&proposition=' + encodeURIComponent(textePropose));
    
    // Effacer les champs de texte du formulaire
    document.getElementById('titre-histoire').value = '';
    document.getElementById('ordre').value = '';
    document.getElementById('suite-histoire').value = '';
});

// Gestionnaire pour la soumission du formulaire de modification de titre
document.getElementById('modifier-titre').addEventListener('submit', function(e) {
    e.preventDefault(); // Empêcher la soumission par défaut du formulaire
    const nouveauTitre = document.getElementById('nouveau-titre').value;
    const histoireActuelle = document.querySelector('.metadata .chroniques-epée-perdue').textContent;

    // Envoyer la demande de modification de titre à la base de données via une requête AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controle/creationhistoire_ctrl.php'); // Assurez-vous que le chemin est correct
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Le titre a été modifié avec succès
            alert('Titre modifié avec succès !');
            
            // Mettre à jour le titre affiché
            document.querySelector('.metadata .chroniques-epée-perdue').textContent = nouveauTitre;
        }
    };
    
    // Envoyer les données au serveur PHP
    xhr.send('nouveau_titre=' + encodeURIComponent(nouveauTitre) + '&histoire_actuelle=' + encodeURIComponent(histoireActuelle));
    
    // Effacer le champ de texte du formulaire
    document.getElementById('nouveau-titre').value = '';
});
</script>