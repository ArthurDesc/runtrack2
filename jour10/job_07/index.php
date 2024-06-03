<?php
// Connexion à la base de données
$mysqli = mysqli_connect("localhost", "root", "", "jour09");

// Vérifier la connexion
if (!$mysqli) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

// Requête SQL pour calculer la superficie totale des étages
$sql = "SELECT SUM(superficie) AS superficie_totale FROM etage";

$result = mysqli_query($mysqli, $sql);

// Vérifier si la requête a réussi
if (!$result) {
    die("Échec de la requête : " . mysqli_error($mysqli));
}

// Récupérer le résultat de la requête
$row = mysqli_fetch_assoc($result);
$superficie_totale = $row['superficie_totale'];
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
                <th>Superficie totale des étages</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $superficie_totale; ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>

<?php
// Fermer la connexion
mysqli_close($mysqli);
?>
