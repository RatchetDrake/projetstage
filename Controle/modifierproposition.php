<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Proposition</title>
    <link rel="stylesheet" href="../Publique/Css/voirproposition.css">
</head>
<body>
    <?php
    include('../Modele/connexionBDD.php');

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        // Récupérez les données de la proposition à modifier depuis la base de données
        $sql = "SELECT * FROM chapitre WHERE id = ?";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            // La proposition avec cet ID n'existe pas
            echo "Proposition introuvable.";
            exit;
        }

        // Affichez un formulaire pré-rempli avec les données existantes de la proposition
        ?>
        <h1>Modifier Proposition</h1>
        <form action="traitement_modifier_proposition.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div>
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" value="<?php echo $row['titre']; ?>" required>
            </div>
            <div>
                <label for="contenu">Contenu :</label>
                <textarea id="contenu" name="contenu" rows="4" required><?php echo $row['contenu']; ?></textarea>
            </div>
            <div>
                <label for="nb_caracteres">Nombre de Caractères :</label>
                <input type="number" id="nb_caracteres" name="nb_caracteres" value="<?php echo $row['Nbcaracteres']; ?>" required>
            </div>
            <div>
                <label for="ordre">Ordre :</label>
                <input type="number" id="ordre" name="ordre" value="<?php echo $row['Ordre']; ?>" required>
            </div>
            <div>
                <label for="nom_utilisateur">Nom de l'Utilisateur :</label>
                <input type="text" id="nom_utilisateur" name="nom_utilisateur" value="<?php echo $row['nom_utilisateur']; ?>" required>
            </div>
            <div>
                <button type="submit">Enregistrer les modifications</button>
            </div>
        </form>
        <?php
    } else {
        echo "ID de proposition non spécifié.";
    }
    ?>
</body>
</html>
