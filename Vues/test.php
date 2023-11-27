<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Descriptions des Univers</title>
</head>
<body>
    <?php
    // Paramètres de connexion à la base de données
    $serveur = "localhost";
    $utilisateur = "RatchetDrake";
    $motdepasse_bd = "Azerty";
    $nomBaseDeDonnees = "projetstage"; // Utilisez le nom correct de votre base de données

    try {
        // Connexion à la base de données avec PDO et configuration du jeu de caractères
        $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees;charset=utf8mb4", $utilisateur, $motdepasse_bd);
        // Configure PDO to throw exceptions on error
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("La connexion à la base de données a échoué : " . $e->getMessage());
    }

    // Récupération de toutes les descriptions pour chaque univers
    $sql = "SELECT univers, GROUP_CONCAT(description SEPARATOR '<br><br>') AS descriptions FROM histoire GROUP BY univers";
    $stmt = $connexion->query($sql);
    $descriptions_par_univers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <?php
    // Affichage des descriptions pour chaque univers
    foreach ($descriptions_par_univers as $row) {
        $univers = $row['univers'];
        $descriptions = $row['descriptions'];
        echo "<h2>Univers $univers</h2>";
        echo "<p>$descriptions</p>";
    }
    ?>
</body>
</html>
