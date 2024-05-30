<?php
session_start(); // Démarre la session

$nbVisites = 0;
if (!isset($_SESSION["nbvisites"])) {
    $_SESSION["nbvisites"] = 1; // Initialise le compteur à 1 si la variable de session n'existe pas
} 

elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reset"])) {
    $_SESSION["nbvisites"] = 0; // Réinitialise le compteur si le bouton "Reset" est cliqué
    }

    else {
        $_SESSION["nbvisites"]++;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombre de visites</title>
</head>
<body>

<?php
// Affichage du nombre de visites
echo "<h1>Nombre de visites : {$_SESSION["nbvisites"]}</h1>";
?>

<form action="index.php" method="post">
    <input type="submit" name="reset" value="Reset">
</form>
    
</body>
</html>
