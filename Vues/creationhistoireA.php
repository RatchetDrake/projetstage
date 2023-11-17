<?php
include('../Controle/creationhistoire_ctrl.php');
include('../Modele/connexionBDD.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Card</title>
    <link rel="stylesheet" href="../Publique/Css/creationhistoire.css">
</head>
<body>
    <div class="containerC">
        <div class="contact-card">
            <div class="frame-2">
                <div class="liste-histoires">Liste des Histoires</div>
            </div>
            <!-- Histoire 1 -->
            <div class="cell" id="histoire-1">
                <div class="avatar">
                    <img src="../images/votre-image-1.jpg" alt="Image de l'histoire 1">
                </div>
                <div class="metadata">
                    <div class="histoire-1">Histoire N° 1</div>
                    <div class="chroniques-epée-perdue">Les Chroniques de l'Épée Perdue</div>
                    <div class="menu-vertical"></div>
                </div>
            </div>
            <!-- Histoire 2 -->
            <div class="cell" id="histoire-2">
                <div class="avatar">
                    <img src="../Publique/images/logohistoire1.png" alt="Image de l'histoire 2">
                </div>
                <div class="metadata">
                    <div class="histoire-1">Histoire N° 2</div>
                    <div class="chroniques-epée-perdue">L'Ascension des Royaumes Obscurs</div>
                    <div class="menu-vertical"></div>
                </div>
            </div>
            <!-- Histoire 3 -->
            <div class="cell" id="histoire-3">
                <div class="avatar">
                    <img src="../images/votre-image-3.jpg" alt="Image de l'histoire 3">
                </div>
                <div class="metadata">
                    <div class="histoire-1">Histoire N° 3</div>
                    <div class="chroniques-epée-perdue">Les Secrets de la Cité Éternelle</div>
                    <div class="menu-vertical"></div>
                </div>
            </div>
            <!-- Histoire 4 -->
            <div class="cell" id="histoire-4">
                <div class="avatar">
                    <img src="../images/votre-image-4.jpg" alt="Image de l'histoire 4">
                </div>
                <div class="metadata">
                    <div class="histoire-1">Histoire N° 4</div>
                    <div class="chroniques-epée-perdue">Le Destin des Héros Oubliés</div>
                    <div class="menu-vertical"></div>
                </div>
            </div>
            <!-- Histoire 5 -->
            <div class="cell" id="histoire-5">
                <div class="avatar">
                    <img src="../images/votre-image-5.jpg" alt="Image de l'histoire 5">
                </div>
                <div class="metadata">
                    <div class="histoire-1">Histoire N° 5</div>
                    <div class="chroniques-epée-perdue">L'Ombre de la Prophétie</div>
                    <div class="menu-vertical"></div>
                </div>
            </div>
            <!-- Histoire 6 -->
            <div class="cell" id="histoire-6">
                <div class="avatar">
                    <img src="../images/votre-image-6.jpg" alt="Image de l'histoire 6">
                </div>
                <div class="metadata">
                    <div class="histoire-1">Histoire N° 6</div>
                    <div class="chroniques-epée-perdue">Les Terres de la Magie Déchue</div>
                    <div class="menu-vertical"></div>
                </div>
            </div>
        </div>

        <!-- Conteneur pour afficher le texte de l'histoire -->
        <div class="histoire-texte" id="histoire-texte">
            <h2></h2>
            <p></p>
        </div>
    </div>

    <!-- Formulaire -->
    <form id="proposer-suite" method="POST" action="../Controle/creationhistoire_ctrl.php" class="histoire-form">
        <select name="ordre" id="ordre" required>
            <option value="" disabled selected>Choisissez une histoire</option>
            <?php
            // Le nombre d'histoires disponibles (modifiable en fonction de votre card)
            $nombreHistoires = 6; // Par exemple, 6 histoires disponibles

            // Générez les options du menu déroulant avec les numéros d'ordre
            for ($i = 1; $i <= $nombreHistoires; $i++) {
                echo "<option value=\"$i\">Histoire $i</option>";
            }
            ?>
        </select>

        <input type="text" name="titre" id="titre-histoire" placeholder="Titre de l'histoire" required>

        <textarea name="proposition" id="suite-histoire" placeholder="Écrivez votre proposition ici (max 800 caractères)" rows="20" cols="60" maxlength="800" required></textarea>

        <br><button type="submit">Proposer la suite</button>
    </form>
    <?php include("../Modele/scriptcreation.php") ?>
</body>
</html>
