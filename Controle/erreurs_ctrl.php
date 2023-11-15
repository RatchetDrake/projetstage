<?php
 // Vérifiez s'il y a des erreurs d'inscription dans la session
 if (isset($_SESSION['erreurs_inscription']) && !empty($_SESSION['erreurs_inscription'])) {
    echo '<div style="color: red;">';
    foreach ($_SESSION['erreurs_inscription'] as $erreur) {
        echo $erreur . '<br>';
    }
    echo '</div>';
     // Effacez les erreurs de la session après les avoir affichées
unset($_SESSION['erreurs_inscription']);

}
// Espace réservé pour les messages d'erreur
if (isset($_SESSION['erreur']) && !empty($_SESSION['erreur'])) {
    echo '<div style="color: red;">'; // Utilisez la couleur rouge pour les erreurs
    echo '<div>' . $_SESSION['erreur'] . '</div>'; // Supprimez la classe "div-erreur"
    echo '</div>';
    unset($_SESSION['erreur']);
}

