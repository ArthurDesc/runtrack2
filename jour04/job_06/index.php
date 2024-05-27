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

<?php
if ($_SERVER ['REQUEST_METHOD'] == 'GET' && isset($_GET['nombre'])) {
    $input = $_GET['nombre'];
    $nombre = 0;
    $negative = false;


if ($input['0'] == '-') {
    $negative = true;
    $start_index = 0;
} else {
    $start_index = 1;

    $i = $start_index; 
    while () {
        
        
    }

}


}

?>


</body>
</html>
