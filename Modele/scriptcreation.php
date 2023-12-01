
<?php
include("../Modele/connexionBDD.php") ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
// Tableau avec le texte complet de chaque histoire
const histoires = [
    // Histoire 1
    ``,
    // Histoire 2
    ``,
    // Histoire 3
    ``,
    // Histoire 4
    ``,
    // Histoire 5
    ``, 
 // Histoire 6
    ``,
];
<?php
// Récupération de toutes les descriptions pour chaque univers
$sql = "SELECT id, univers, description FROM histoire ORDER BY id";
$stmt = $connexion->query($sql);
$descriptions_par_univers = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Générez l'objet JavaScript à partir des données de la base de données
echo "const descriptionsUnivers = {};";

foreach ($descriptions_par_univers as $row) {
    $univers = $row['univers'];
    $description = addslashes($row['description']); // Échappez les caractères spéciaux

    // Si l'univers n'existe pas encore dans l'objet, créez un tableau pour stocker les descriptions
    echo "if (!descriptionsUnivers[$univers]) { descriptionsUnivers[$univers] = []; }";

    // Ajoutez la description à l'univers correspondant, en entourant la variable $description avec des guillemets doubles
    echo "descriptionsUnivers[$univers].push(\"$description\");";
}
?>

// Fonction pour afficher le texte de l'histoire et ses descriptions
function afficherTexteHistoire(numero) {
    const histoireTexte = document.getElementById('histoire-texte');
    const titreHistoire = document.querySelector('.metadata .chroniques-epée-perdue');
    let texteHistoire;
    let titre;
    let univers;

    // Créez un tableau d'objets contenant les correspondances entre les numéros, titres d'histoires et univers
    const correspondances = [
        { numero: 1, titre: "Les Chroniques de l'Épée Perdue", univers: 1 },
        { numero: 2, titre: "L'Odyssée de l'Étoile d'Argent", univers: 2 },
        { numero: 3, titre: "Le Shérif de Dusty Gulch", univers: 3 },
        { numero: 4, titre: "La Quête d'Elara", univers: 4 },
        { numero: 5, titre: "Les Errants de l'Apocalypse", univers: 5 },
        { numero: 6, titre: "Les Antihéros Incontrôlables", univers: 6 },
    ];

    // Recherchez la correspondance du numéro donné dans le tableau correspondances
    const correspondance = correspondances.find(item => item.numero === numero);

    if (correspondance) {
        titre = correspondance.titre;
        texteHistoire = histoires[numero - 1]; // Soustrayez 1 car les indices commencent à 0
        univers = correspondance.univers;
    } else {
        titre = "Histoire non trouvée";
        texteHistoire = "Histoire non trouvée";
        univers = null;
    }

    histoireTexte.querySelector('h2').textContent = titre;
    histoireTexte.querySelector('p').textContent = texteHistoire;

    // Supprimer l'affichage de l'univers précédent s'il existe
    const universPrecedent = histoireTexte.querySelector('.univers-description');
    if (universPrecedent) {
        universPrecedent.remove();
    }

    // Afficher les descriptions de l'univers correspondant s'il existe
    if (univers !== null && descriptionsUnivers[univers]) {
        const descriptions = descriptionsUnivers[univers];
        const divUnivers = document.createElement('div');
        divUnivers.className = 'univers-description';

        descriptions.forEach(description => {
            const p = document.createElement('p');
            p.textContent = description;
            divUnivers.appendChild(p);
        });

        histoireTexte.appendChild(divUnivers);
    }
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

    // Gestionnaire pour la soumission du formulaire
    document.getElementById('proposer-suite').addEventListener('submit', function(e) {
        const ordreSelect = document.getElementById('ordre');
        
        // Vérifier si l'option par défaut a été sélectionnée
        if (ordreSelect.value === "") {
            alert("Veuillez choisir une histoire avant de soumettre le formulaire.");
            e.preventDefault(); // Empêcher la soumission du formulaire
        }
    });

// Ajoutez cette fonction à votre script JavaScript existant
function afficherDescriptions() {
    const descriptionsDiv = document.getElementById('descriptions');

    // Requête AJAX pour récupérer les descriptions depuis le fichier PHP
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_descriptions.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const descriptions = JSON.parse(xhr.responseText);
            const descriptionsHTML = descriptions.map(description => `<p>${description}</p>`).join('');
            descriptionsDiv.innerHTML = descriptionsHTML;
        }
    };

    // Envoyer la requête
    xhr.send();
}

// Appelez cette fonction pour afficher les descriptions lorsque nécessaire
afficherDescriptions();
function removeInvalidChars(textarea) {
    textarea.value = textarea.value.replace(/"/g, '').replace(/\n/g, '');
}

</script>