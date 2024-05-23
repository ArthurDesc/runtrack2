<?php
// Hauteur du triangle
$hauteur = 20;

// Dessiner le triangle isocèle vide
for ($i = 1; $i <= $hauteur; $i++) {
    // Afficher les espaces avant les étoiles pour centrer le triangle
    for ($j = $i; $j < $hauteur; $j++) {
        echo "&nbsp;&nbsp;";
    }
    // Afficher les étoiles pour la ligne actuelle
    for ($j = 1; $j <= (2 * $i - 1); $j++) {
        // Afficher les étoiles sur les bords ou la ligne de base du triangle
        if ($j == 1 || $j == (2 * $i - 1) || $i == $hauteur) {
            echo "*";
        } else {
            echo "&nbsp;&nbsp;";
        }
    }
    // Aller à la ligne suivante
    echo "<br />";
}
?>
