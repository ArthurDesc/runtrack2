<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire GET</title>
</head>
<body>
    <form action="index.php" method="get">
        <label for="prénom">Prénom : </label>
        <input type="text" id="prenom" name="prenom">
        <br />
        <label for="nom">Nom : </label>
        <input type="text" id="nom" name="nom">
        <br />
        <label for="age">Age : </label>
        <input type="text" id="age" name="age">
        <br />
        <input type="submit" value="Envoyer">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET)) {
        echo "<table border=2>";
        echo "<tr><th>Arguments</th><th>Valeurs</th></tr>";

        foreach ($_GET as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
        }
    }
    echo "</table>";

    ?>
</body>
</html>
    