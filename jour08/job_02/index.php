<?php
// Initialisation des cookies 
$name = "nbvisites";
$value = 1;

// Vérifie si le cookie 'nbvisites' existe
if (!isset($_COOKIE[$name])) {
    // Si le cookie n'existe pas, l'initialise à 1
    setcookie($name, $value, time() + (86400 * 30), "/"); // Expire dans 30 jours
} 

// Code pour faire marcher le formulaire et utiliser le bouton reset 
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reset"])) {
    setcookie($name, 0, time() - 3600, "/");
    $value = 0;

} else {
    // Si le cookie existe et que le formulaire n'a pas été soumis, incrémente le compteur de visites
    $value = isset($_COOKIE[$name]) ? $_COOKIE[$name] + 1 : 1;
    // Met à jour le cookie avec la nouvelle valeur du compteur
    setcookie($name, $value, time() + (30), "/"); // Expire dans 30 jours
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
echo "<h1>Nombre de visites : $value</h1>";
?>

<form action="index.php" method="post">
    <input type="submit" name="reset" value="Reset">
</form>
    
</body>
</html>
