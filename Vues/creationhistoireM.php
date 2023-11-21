<?php
include('../Controle/creationhistoire_ctrl.php');
include('../Modele/connexionBDD.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Card</title>
    <link rel="stylesheet" href="../Publique/Css/creationhistoire.css">
</head>
<body>
<div id="background-left"></div>
<div id="background-right"></div>
    <div class="containerC">
        <div class="contact-card">
            <div class="frame-2">
                <div class="liste-histoires">Liste des Histoires</div>
            </div>

            <!-- Histoire 1 -->
            <div class="cell" id="histoire-1">
                <div class="avatar">
                    <img src="../Publique/images/logohistoire2.png" alt="Image de l'histoire 1">
                </div>
                <div class="metadata">
                    <div class="histoire-1">Univers Mediéval</div>
                    <div class="chroniques-epée-perdue">Les Chroniques de l'Épée Perdue</div>
                    <div class="menu-vertical"></div>
                </div>
                <!-- Système de notation en 5 étoiles pour l'histoire 1 -->
                <div class="rating" id="rating-1">
                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                </div>
            </div>

            <!-- Histoire 2 -->
            <div class="cell" id="histoire-2">
                <div class="avatar">
                    <img src="../Publique/images/logohistoire1.png" alt="Image de l'histoire 2">
                </div>
                <div class="metadata">
                    <div class="histoire-1">Univers de Science-Fiction</div>
                    <div class="chroniques-epée-perdue">L'Odyssée de l'Étoile d'Argent</div>
                    <div class="menu-vertical"></div>
                </div>
                <!-- Système de notation en 5 étoiles pour l'histoire 2 -->
                <div class="rating" id="rating-2">
                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                </div>
            </div>

            <!-- Histoire 3 -->
            <div class="cell" id="histoire-3">
                <div class="avatar">
                    <img src="../Publique/images/logohistoire3.png" alt="Image de l'histoire 3">
                </div>
                <div class="metadata">
                    <div class="histoire-1">Univers de Western</div>
                    <div class="chroniques-epée-perdue">Le Shérif de Dusty Gulch</div>
                    <div class="menu-vertical"></div>
                </div>
                <!-- Système de notation en 5 étoiles pour l'histoire 3 -->
                <div class="rating" id="rating-3">
                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                </div>
            </div>

            <!-- Histoire 4 -->
            <div class="cell" id="histoire-4">
                <div class="avatar">
                    <img src="../Publique/images/logohistoire4.png" alt="Image de l'histoire 4">
                </div>
                <div class="metadata">
                    <div class="histoire-1">Univers Magique</div>
                    <div class="chroniques-epée-perdue">La Quête d'Elara</div>
                    <div class="menu-vertical"></div>
                </div>
                <!-- Système de notation en 5 étoiles pour l'histoire 4 -->
                <div class="rating" id="rating-4">
                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                </div>
            </div>

            <!-- Histoire 5 -->
            <div class="cell" id="histoire-5">
                <div class="avatar">
                    <img src="../Publique/images/logohistoire5.png" alt="Image de l'histoire 5">
                </div>
                <div class="metadata">
                    <div class="histoire-1">Univers Post-Apocalypse</div>
                    <div class="chroniques-epée-perdue">Les Errants de l'Apocalypse"</div>
                    <div class="menu-vertical"></div>
                </div>
                <!-- Système de notation en 5 étoiles pour l'histoire 5 -->
                <div class="rating" id="rating-5">
                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                </div>
            </div>

            <!-- Histoire 6 -->
            <div class="cell" id="histoire-6">
                <div class="avatar">
                    <img src="../Publique/images/logohistoire6.png" alt="Image de l'histoire 6">
                </div>
                <div class="metadata">
                    <div class="histoire-1">Univers de Super-Héros</div>
                    <div class="chroniques-epée-perdue">Les Antihéros Incontrôlables</div>
                    <div class="menu-vertical"></div>
                </div>
                <!-- Système de notation en 5 étoiles pour l'histoire 6 -->
                <div class="rating" id="rating-6">
                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                </div>
            </div>
 
            </div>
             <!-- Conteneur pour afficher le texte de l'histoire -->
             <div class="histoire-texte" id="histoire-texte">
                <h2></h2>
                <p></p>
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
        </div>

       
        <?php include("../Modele/scriptcreation.php") ?>
    </div>
    
    <?php include("../Modele/scriptnote.php")
    ?>

    <!-- Inclure le lien vers votre fichier JavaScript ici -->
    <!-- Inclure le lien vers votre fichier CSS ici -->
</body>
</html>
