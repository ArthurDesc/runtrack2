<?php
$sqlConnect = mysqli_connect("localhost", "root", "", "jour09");

if (!$sqlConnect) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

$request = mysqli_query($sqlConnect, "SELECT 'nom', 'capacite' FROM salle");

if (!$request) {
    die("Échec de la requête : " . mysqli_error($sqlConnect));
}
// ICI ON CONNECTE NOTRE SQL ET ON AFFICHE UN MESSAGE EN CAS DE DECO 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <?php
                // Afficher les noms des colonnes
                $fieldinfo_array = mysqli_fetch_fields($request);
                foreach ($fieldinfo_array as $fieldinfo) {
                    echo "<th>{$fieldinfo->name}</th>";
                }
                ?>
            </tr>
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

<?php
// Fermer la connexion
mysqli_close($sqlConnect);
?>
