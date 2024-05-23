<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Déclaration de la chaîne
$str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";

// Initialisation de l'index
$i = 0;

// Parcours de la chaîne en affichant un caractère sur deux
while (isset($str[$i])) {
    // Afficher uniquement les caractères avec un index pair
    echo $str[$i];
    // Passer au caractère suivant
    $i += 2;
}
?>


</body>
</html>