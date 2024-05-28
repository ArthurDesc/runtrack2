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
    <input type="number" id="nombre" name="nombre" required>
    <input type="submit" value="Envoyer">
</form>


<?php
$length =0;

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['nombre'])) {
    $input = $_GET['nombre'];


    for ($length=0;isset($input[$length]);$length++) { 
        if ($longueur > 0 ) {
            $dernier_caractere = $input [$length - 1];
            echo $length; 
}
}
}

?>



    
</body>
</html> 


