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
    // Vérifier si des données GET ont été soumises
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET)) {
        echo "<table border='1'>";
        echo "<tr><th>Arguments</th><th>Valeurs</th></tr>";
        // Parcourir chaque élément de $_GET et afficher dans le tableau
        foreach ($_GET as $argument => $valeur) {
            echo "<tr><td>$argument</td><td>$valeur</td></tr>";
        }
        echo "</table>";
    } else {
        // Afficher un message si aucun argument GET n'a été soumis
        echo "<p>Aucun argument GET n'a été soumis.</p>";
    }
    ?>
</body>
</html>
    