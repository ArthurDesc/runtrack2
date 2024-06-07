<?php
// Connexion à la base de données
$mysqli = mysqli_connect("localhost", "root", "", "jour09");

// Vérifier la connexion
if (!$mysqli) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

$request = mysqli_query($mysqli, "SELECT prenom, nom, naissance FROM etudiants WHERE naissance BETWEEN '1999-12-31' AND '2016-09-08';");
// DONNE LA REQUETE A SUIVRE

// ENREGISTREMENT DE LA REQUETE DANS UNE VARIABLE
$row = mysqli_fetch_assoc($request);


// Vérifier si la requête a réussi
if (!$request) {
    die("Échec de la requête : " . mysqli_error($mysqli));
}

// Récupérer le résultat de la requête
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

        <h1>Liste des étudiants :</h1>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Naissance</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($request)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
                echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
                echo "<td>" . htmlspecialchars($row['naissance']) . "</td>";
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
