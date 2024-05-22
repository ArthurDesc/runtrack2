<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Largeur et hauteur du rectangle
$largeur = 30;
$hauteur = 10;

// Dessiner le rectangle
for ($i = 0; $i < $hauteur; $i++) {
    for ($j = 0; $j < $largeur; $j++) {
        if ($i == 0 || $i == $hauteur - 1 || $j == 0 || $j == $largeur - 1) {
            echo "* ";
        } else {
            echo "&nbsp;&nbsp;";
        }
    }
    echo "<br />";
}
?>




 







</body>
</html>