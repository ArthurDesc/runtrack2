<?php
$sqlConnect = mysqli_connect("localhost", "root", "", "jour09");

if (!$sqlConnect) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

$request = mysqli_query($sqlConnect, "SELECT * FROM etudiants");

if (!$request) {
    die("Échec de la requête : " . mysqli_error($sqlConnect));
}
// ICI ON CONNECTE NOTRE SQL ET ON AFFICHE UN MESSAGE EN CAS DE DECO 
?>  

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>Nom</tr>
            <tr>Capacité</tr>
        </thead>
        <tbody>
        <?php
            // Afficher les lignes de données
            while ($row = mysqli_fetch_assoc($request)) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
    
</body>
</html>