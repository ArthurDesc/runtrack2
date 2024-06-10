<?php 

$mysqli = mysqli_connect('localhost', 'root', '', 'livreor');

if (!$mysqli) {
    die("Échec de la connexion : ". mysqli_connect_error());
}

$requete = $mysqli->prepare("SELECT * FROM commentaires ORDER BY date");
$result = $requete->get_result();


if (!$result) {
    die("Échec de la requête : ". mysqli_error($mysqli));
}





$requete->close();
    mysqli_close($mysqli);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>