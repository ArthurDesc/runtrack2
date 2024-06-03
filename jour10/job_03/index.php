<?php
$mysqli = mysqli_connect("localhost", "root", "", "jour09");

if (!$mysqli) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

$request = mysqli_query($mysqli, "SELECT prenom, nom, naissance FROM etudiants WHERE sexe = 'Femme'");

if (!$request) {
    die("Échec de la requête : " . mysqli_error($mysqli));
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
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
                <th>Prénom</th>
                <th>Nom</th>
                <th>Naissance</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Afficher les lignes de données
            while ($data = mysqli_fetch_assoc($request)) {
                echo "<tr>";
                foreach ($data as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
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
