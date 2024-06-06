<?php
// Connexion à la base de données
$mysqli = mysqli_connect("localhost", "root", "", "jour09");

// Vérifier la connexion
if (!$mysqli) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

$request = mysqli_query($mysqli, "SELECT AVG(capacite) AS valeur_moyenne FROM salles;");
$valeur_moyenne = 0;
// DONNE LA REQUETE A SUIVRE

// Vérifier si la requête a réussi
if (!$request) {
    die("Échec de la requête : " . mysqli_error($mysqli));
}

// Récupérer le résultat de la requête
$row = mysqli_fetch_assoc($request);
$capacite = $row['capacite'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superficie totale des étages</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Salles</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Tant qu'il y a des lignes à afficher
            while ($row = mysqli_fetch_assoc($request)) {
                echo "<tr><td>" . $row['capacite'] . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Fermer la connexion
mysqli_close($mysqli);
?>
