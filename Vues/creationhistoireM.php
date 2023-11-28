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
                <div class="metadata">
                    <div class="histoire-1">Univers Médiéval</div>
                    <div class="chroniques-epée-perdue">Les Chroniques de l'Épée Perdue</div>
                </div>
                <div class="avatar">
                    <img src="../Publique/images/logohistoire2.png" alt="Image de l'histoire 1">
                </div>

                <!-- Système de notation en 5 étoiles pour l'histoire 1 -->
                <form method="POST" id="formetoile-1" action="../Controle/note.ctrl.php">
                    <input type="hidden" name="ordre" value="1"> <!-- L'ordre de l'histoire -->
                    <div class="rating-vertical" id="rating-1">
                        <input type="radio" id="note1-1" name="note" value="1">1☆<br>
                        <input type="radio" id="note2-1" name="note" value="2">2☆<br>
                        <input type="radio" id="note3-1" name="note" value="3">3☆<br>
                        <input type="radio" id="note4-1" name="note" value="4">4☆<br>
                        <input type="radio" id="note5-1" name="note" value="5">5☆<br>
                    </div>
                    <button type="submit">Envoyer la note</button>
                </form>
            </div>

            <!-- Histoire 2 -->
            <div class="cell" id="histoire-2">
                <div class="metadata">
                    <div class="histoire-1">Univers de Science-Fiction</div>
                    <div class="chroniques-epée-perdue">L'Odyssée de l'Étoile d'Argent</div>
                </div>
                <div class="avatar">
                    <img src="../Publique/images/logohistoire1.png" alt="Image de l'histoire 2">
                </div>
                <!-- Système de notation en 5 étoiles pour l'histoire 2 -->
                <form method="POST" id="formetoile-2" action="../Controle/note.ctrl.php">
                    <input type="hidden" name="ordre" value="2"> <!-- L'ordre de l'histoire -->
                    <div class="rating-vertical" id="rating-2">
                        <input type="radio" id="note1-2" name="note" value="1">1☆<br>
                        <input type="radio" id="note2-2" name="note" value="2">2☆<br>
                        <input type="radio" id="note3-2" name="note" value="3">3☆<br>
                        <input type="radio" id="note4-2" name="note" value="4">4☆<br>
                        <input type="radio" id="note5-2" name="note" value="5">5☆<br>
                    </div>
                    <button type="submit">Envoyer la note</button>
                </form>
            </div>

            <!-- Histoire 3 -->
            <div class="cell" id="histoire-3">
                <div class="metadata">
                    <div class="histoire-1">Univers de Western</div>
                    <div class="chroniques-epée-perdue">Le Shérif de Dusty Gulch</div>
                </div>
                <div class="avatar">
                    <img src="../Publique/images/logohistoire3.png" alt="Image de l'histoire 3">
                </div>
                <!-- Système de notation en 5 étoiles pour l'histoire 3 -->
                <form method="POST" id="formetoile-3" action="../Controle/note.ctrl.php">
                    <input type="hidden" name="ordre" value="3"> <!-- L'ordre de l'histoire -->
                    <div class="rating-vertical" id="rating-3">
                        <input type="radio" id="note1-3" name="note" value="1">1☆<br>
                        <input type="radio" id="note2-3" name="note" value="2">2☆<br>
                        <input type="radio" id="note3-3" name="note" value="3">3☆<br>
                        <input type="radio" id="note4-3" name="note" value="4">4☆<br>
                        <input type="radio" id="note5-3" name="note" value="5">5☆<br>
                    </div>
                    <button type="submit">Envoyer la note</button>
                </form>
            </div>

            <!-- Histoire 4 -->
            <div class="cell" id="histoire-4">
                <div class="metadata">
                    <div class="histoire-1">Univers Magique</div>
                    <div class="chroniques-epée-perdue">La Quête d'Elara</div>
                </div>
                <div class="avatar">
                    <img src="../Publique/images/logohistoire4.png" alt="Image de l'histoire 4">
                </div>
                <!-- Système de notation en 5 étoiles pour l'histoire 4 -->
                <form method="POST" id="formetoile-4" action="../Controle/note.ctrl.php">
                    <input type="hidden" name="ordre" value="4"> <!-- L'ordre de l'histoire -->
                    <div class="rating-vertical" id="rating-4">
                        <input type="radio" id="note1-4" name="note" value="1">1☆<br>
                        <input type="radio" id="note2-4" name="note" value="2">2☆<br>
                        <input type="radio" id="note3-4" name="note" value="3">3☆<br>
                        <input type="radio" id="note4-4" name="note" value="4">4☆<br>
                        <input type="radio" id="note5-4" name="note" value="5">5☆<br>
                    </div>
                    <button type="submit">Envoyer la note</button>
                </form>
            </div>

            <!-- Histoire 5 -->
            <div class="cell" id="histoire-5">
                <div class="metadata">
                    <div class="histoire-1">Univers Post-Apocalypse</div>
                    <div class="chroniques-epée-perdue">Les Errants de l'Apocalypse"</div>
                </div>
                <div class="avatar">
                    <img src="../Publique/images/logohistoire5.png" alt="Image de l'histoire 5">
                </div>
                <!-- Système de notation en 5 étoiles pour l'histoire 5 -->
                <form method="POST" id="formetoile-5" action="../Controle/note.ctrl.php">
                    <input type="hidden" name="ordre" value="5"> <!-- L'ordre de l'histoire -->
                    <div class="rating-vertical" id="rating-5">
                        <input type="radio" id="note1-5" name="note" value="1">1☆<br>
                        <input type="radio" id="note2-5" name="note" value="2">2☆<br>
                        <input type="radio" id="note3-5" name="note" value="3">3☆<br>
                        <input type="radio" id="note4-5" name="note" value="4">4☆<br>
                        <input type="radio" id="note5-5" name="note" value="5">5☆<br>
                    </div>
                    <button type="submit">Envoyer la note</button>
                </form>
            </div>

            <!-- Histoire 6 -->
            <div class="cell" id="histoire-6">
                <div class="metadata">
                    <div class="histoire-1">Univers de Super-Héros</div>
                    <div class="chroniques-epée-perdue">Les Antihéros Incontrôlables</div>
                </div>
                <div class="avatar">
                    <img src="../Publique/images/logohistoire6.png" alt="Image de l'histoire 6">
                </div>
                <!-- Système de notation en 5 étoiles pour l'histoire 6 -->
                <form method="POST" id="formetoile-6" action="../Controle/note.ctrl.php">
                    <input type="hidden" name="ordre" value="6"> <!-- L'ordre de l'histoire -->
                    <div class="rating-vertical" id="rating-6">
                        <input type="radio" id="note1-6" name="note" value="1">1☆<br>
                        <input type="radio" id="note2-6" name="note" value="2">2☆<br>
                        <input type="radio" id="note3-6" name="note" value="3">3☆<br>
                        <input type="radio" id="note4-6" name="note" value="4">4☆<br>
                        <input type="radio" id="note5-6" name="note" value="5">5☆<br>
                    </div>
                    <button type="submit">Envoyer la note</button>
                </form>
            </div>

        </div>
        <!-- Conteneur pour afficher le texte de l'histoire -->
        <div class="conteneur">
        <div class="histoire-texte" id="histoire-texte">
            <h2></h2>
            <p></p>
           

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

                <input type="text" name="titre" id="titre-histoire" placeholder="Titre de l'histoire(Optionel)">

                <textarea name="proposition" id="suite-histoire" placeholder="Écrivez votre proposition ici (max 720 caractères)" rows="20" cols="60" maxlength="750" required oninput="removeInvalidChars(this)"></textarea>

                <br><button type="submit">Proposer la suite</button>
            </form>
        <?php include("../Modele/scriptcreation.php") ?>

    </div>
    </div>

    <?php include("../Modele/scriptnote.php")
    ?>

</body>

</html>