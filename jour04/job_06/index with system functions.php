<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Entre une valeur :</h1>
<form method="get">
    <label for="nombre">Nombre : </label>
    <input type="text" id="nombre" name="nombre" required>
    <input type="submit" value="Envoyer">
</form>

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
    $nombre = intval($input); // Convertir la chaîne en entier

    // Récupérer le dernier chiffre du nombre
    $dernierChiffre = abs($nombre % 10); // Utilisation de abs() pour gérer les nombres négatifs

    // Vérifier si le dernier chiffre est pair ou impair
    if ($dernierChiffre % 2 == 0) {
        echo "Ce Nombre est pair";
    } else {
        echo "Ce Nombre est impair";
    }
}
?>



    
</body>
</html>


</body>
</html>
