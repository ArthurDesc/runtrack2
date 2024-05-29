<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dessiner un Triangle</title>
</head>
<body>
    <form method="post" action="">
        Largeur: <input type="text" name="largeur"><br>
        Hauteur: <input type="text" name="hauteur"><br>
        <input type="submit" value="Dessiner">
    </form>

    <?php
    if (isset($_POST['largeur']) && isset($_POST['hauteur'])) {
        $largeur_str = $_POST['largeur'];
        $hauteur_str = $_POST['hauteur'];

        $largeur = 0;
        $hauteur = 0;

        // Conversion de la largeur
        $i = 0;
        while (isset($largeur_str[$i])) {
            $char = $largeur_str[$i];
            if ($char >= '0' && $char <= '9') {
                $largeur = $largeur * 10 + ($char - '0');
            } else {
                $largeur = -1; // Valeur invalide si la chaîne contient des caractères non numériques
                break;
            }
            $i++;
        }

        // Conversion de la hauteur
        $i = 0;
        while (isset($hauteur_str[$i])) {
            $char = $hauteur_str[$i];
            if ($char >= '0' && $char <= '9') {
                $hauteur = $hauteur * 10 + ($char - '0');
            } else {
                $hauteur = -1; // Valeur invalide si la chaîne contient des caractères non numériques
                break;
            }
            $i++;
        }

        if ($largeur > 0 && $hauteur > 0) {
            // Dessiner le sommet du triangle
            for ($i = 1; $i <= $hauteur; $i++) {
                // Espaces avant la barre /
                for ($j = 0; $j < $hauteur - $i; $j++) {
                    echo '&nbsp;&nbsp;';
                }
                echo '/';
                
                // Traits de soulignement entre / et \
                if ($i > 1) {
                    for ($k = 0; $k < 2 * ($i - 1); $k++) {
                        echo '_';
                    }
                }
                echo '\\<br>';
            }

            // Dessiner le rectangle sous le triangle
            for ($i = 1; $i <= $hauteur; $i++) {
                echo '|';
                // Espaces à l'intérieur du rectangle
                for ($j = 0; $j < $largeur - 2; $j++) {
                    echo '&nbsp;&nbsp;';
                }
                echo '|<br>';
            }
            // Dessiner la base du rectangle
            echo '|';
            for ($j = 0; $j < $largeur - 2; $j++) {
                echo '_';
            }
            echo '|<br>';
        } else {
            echo "Veuillez entrer des valeurs numériques valides pour la largeur et la hauteur.";
        }
    }
    ?>
</body>
</html>
