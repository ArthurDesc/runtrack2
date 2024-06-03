<?php
// Connexion à la base de données
$mysqli = mysqli_connect("localhost", "root", "", "jour09");

// Vérifier la connexion
if (!$mysqli) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

// Requête SQL pour calculer la somme des capacités totales des salles
$sql = "SELECT SUM(capacite) AS capacite_totale FROM salles";

$result = mysqli_query($mysqli, $sql);

// Vérifier si la requête a réussi
if (!$result) {
    die("Échec de la requête : " . mysqli_error($mysqli));
}

// Récupérer le résultat de la requête
$row = mysqli_fetch_assoc($result);
$capacite_totale = $row['capacite_totale'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capacité totale des salles</title>
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
                <th>Capacité totale des salles</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $capacite_totale; ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>

<?php
// Fermer la connexion
mysqli_close($mysqli);
?>
