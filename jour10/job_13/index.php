<?php
$mysqli = new mysqli("localhost","root","","jour09");

if ($mysqli->connect_error) {
    die("Echec de la connexion". $mysqli->connect_error);
}

$sql = "SELECT salles.nom AS salles_name, etage.nom AS etage_name FROM salles INNER JOIN etage ON salles.id_etage = etage.id";

$result = $mysqli->query($sql);

if ($result === false) {
    die("Echec de la requete". $mysqli->error);

}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des salles et étages</title>
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
    <h1>Liste des salles et étages :</h1>
    <table>
        <thead>
            <tr>
                <th>Nom des salles</th>
                <th>Nom des étages</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Affichage des résultats de la requête
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['salles_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['etage_name']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Aucune donnée trouvée</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Fermer la connexion
$mysqli->close();
?>

