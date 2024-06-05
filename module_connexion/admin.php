

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<a href="./index.php">Accueil</a>



<?php
    $mysqli = mysqli_connect("localhost", "root", "", "moduleconnexion");
    if (!$mysqli) {
        die("Échec de la connexion : " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM utilisateurs";
    $result = $mysqli->query($sql);

   // Afficher les données des utilisateurs dans un tableau HTML
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Login</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["nom"] . "</td>";
    echo "<td>" . $row["prenom"] . "</td>";
    echo "<td>" . $row["login"] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>


<a href="./profil.php">Page de profil</a>

    
</body>
</html>