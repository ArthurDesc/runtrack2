<?php
session_start(); // Démarre la session

// Initialisation de la variable de session "prenom" si elle n'est pas déjà définie
if (!isset($_SESSION["prenom"])) {
    $_SESSION["prenom"] = "";
}

// Traitement des requêtes POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Réinitialisation du prénom si le bouton "Reset" est cliqué
    if (isset($_POST["reset"])) {
        $_SESSION["prenom"] = "";
    } 
    // Enregistrement du prénom dans la session si le champ "prenom" est soumis
    elseif (isset($_POST["prenom"])) {
        $_SESSION["prenom"] = $_POST["prenom"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>

<form action="index.php" method="post">
    <input type="text" name="prenom" value="<?php echo htmlspecialchars($_SESSION['prenom']); ?>">
    <input type="submit" name="submit" value="Envoyer">
    <br />

    <input type="submit" name="reset" value="Reset">
</form>

<?php
// Affichage du prénom si il est défini dans la session
if ($_SESSION["prenom"] !== "") {
    echo "<ul><li>" . htmlspecialchars($_SESSION["prenom"]) . "</li></ul>";
}
?>

</body>
</html>
