<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form name="index.php" method="get">


<label for="nombre">Nombre : </label>
<input type="text" id="nombre" name="nombre">

<input type="submit" value="Envoyer">

</form>
    <?php

    $nombre = $_GET['nombre'];

    if ($_SERVER ['REQUEST_METHOD'] == 'GET' && isset($nombre)) {
        foreach ($_GET as $key => $value) {
    if ($_GET == 2 % 0) {
    echo "Nombre pair";

    } else { 
        echo "nombre impair";
    }
}
    }

    

    ?>
    
</body>
</html>