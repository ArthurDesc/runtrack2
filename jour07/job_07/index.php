<?php

function gras($str) {
    $maj = array("A", "E", "I", "O", "U", "Y", "B", "C", "D", "F", "G", "H", "J", "K", "L", "M",
    "N", "P", "Q", "R", "S", "T", "V", "W", "X", "Z");

    $result="";

    for ($i = 0; isset($str[$i]); $i++) {
        if (in_array($str[$i], $maj)) {
            $result .= "<b>$str[$i]</b>";
        } else {
            $result .= $str[$i];
        }

    }
    
}
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['fonction']) && isset($_GET['text'])) {

}

        
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<style>
    body {
        margin: 1vw;
    }
</style>

<form method="get" actions="index.php">
    <input type="text">
    <select name="fonction" id="fonction">
        <option value="gras">Gras</option>
        <option value="cesar">Cesar</option>
        <option value="plateforme">Plateforme</option>
    </select>
    <button type="button" class="btn btn-primary">Appliquer</button>
</form>
    
</body>
</html>