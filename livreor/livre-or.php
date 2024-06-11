<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des commentaires</title>
    <!-- Lien vers le fichier CSS de Bootstrap 5 depuis jsDelivr CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main>
        <div class="container mt-5">
            <!-- Lien vers la page d'accueil -->
            <a href="./profil.php" class="btn btn-secondary mb-3">Profil</a>
            <br />
            <a href="./commentaires.php" class="btn btn-secondary mb-3">Laisser un commentaire</a>
            
            <!-- PHP pour afficher la liste des commentaires -->
            <?php
                // Connexion à la base de données
                $mysqli = mysqli_connect("localhost", "root", "", "livreor");
                if (!$mysqli) {
                    die("Échec de la connexion : " . mysqli_connect_error());
                }

                // Requête SQL pour récupérer les commentaires
                $request = "SELECT commentaires.commentaire, commentaires.date, login 
                FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id";
                $stmt = $mysqli->prepare($request);
                $stmt->execute();
                $result = $stmt->get_result();

                echo "<h3>Liste des commentaires</h3>";
                echo "<ul class='list-group'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li class='list-group-item'>";
                    echo "<p>" . htmlspecialchars($row["login"]) . "</p><br>";
                    echo "<p>Commentaire: " . htmlspecialchars($row["commentaire"]) . "</p><br>";
                    echo "<p>Date: " . htmlspecialchars($row["date"]) . "</p><br>";
                    echo "</li>";
                }
                echo "</ul>";

                // Fermeture de la connexion
                $stmt->close();
                $mysqli->close();
            ?>

            <!-- Lien vers la page de profil -->
            <a href="./profil.php" class="btn btn-primary mt-3">Page de profil</a>
        </div>
    </main>


    <!-- Lien vers le fichier JS de Bootstrap 5 depuis jsDelivr CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
