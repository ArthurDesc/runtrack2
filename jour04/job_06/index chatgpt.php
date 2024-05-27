<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="get">
    <label for="nombre">Nombre : </label>
    <input type="text" id="nombre" name="nombre" required>
    <input type="submit" value="Envoyer">
</form>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['nombre'])) {
    $input = $_GET['nombre'];
    $negative = false;
    $nombre = 0;

    // Vérification du signe négatif
    if ($input[0] == '-') {
        $negative = true;
        $startIndex = 1;
    } else {
        $startIndex = 0;
    }

    // Conversion de la chaîne en entier
    // Conversion de la chaîne en entier
    $i = $startIndex;
    $length = strlen($input);
    while ($i < $length && $input[$i] !== '') {
        $char = $input[$i];

        if ($char >= '0' && $char <= '9') {
            $nombre = $nombre * 10 + ($char - '0');
            $i++;
        } else {
            echo "Entrée invalide.";
            exit();
        }
    }


    // Appliquer le signe négatif si nécessaire
    if ($negative) {
        $nombre = -$nombre;
    }
    
    // Vérification du nombre pair ou impair
    if ($nombre % 2 == 0) {
        echo "Ce Nombre est pair";
    } else {
        echo "Ce Nombre est impair";
    }
}
?>


    
</body>
</html>