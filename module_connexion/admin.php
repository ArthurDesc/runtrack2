<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <!-- Lien vers le fichier CSS de Bootstrap 5 depuis jsDelivr CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Lien vers la page d'accueil -->
        <a href="./index.php" class="btn btn-primary mb-3">Accueil</a>
        
        <!-- PHP pour afficher la liste des utilisateurs -->
        <?php
            // Connexion à la base de données
            $mysqli = mysqli_connect("localhost", "root", "", "moduleconnexion");
            if (!$mysqli) {
                die("Échec de la connexion : " . mysqli_connect_error());
            }

            // Requête SQL pour récupérer les utilisateurs
            $sql = "SELECT id, nom, prenom, login FROM utilisateurs";
            $stmt = $mysqli->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();

            // Affichage des données dans un tableau HTML
            echo "<table class='table'>";
            echo "<thead><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Login</th></tr></thead><tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["nom"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["prenom"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["login"]) . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";

            // Fermeture de la connexion
            $stmt->close();
            $mysqli->close();
        ?>

        <!-- Lien vers la page de profil -->
        <a href="./profil.php" class="btn btn-primary">Page de profil</a>
    </div>
</body>
</html>
