<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit;
}

// Récupérer l'ID de l'utilisateur connecté
$user_id = $_SESSION['user_id'];

// Traitement du formulaire de commentaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si le formulaire de commentaire a été soumis
    if (isset($_POST['comment'])) {
        // Récupérer le commentaire soumis depuis le formulaire
        $comment = htmlspecialchars($_POST['comment']); // Sécuriser le commentaire

        // CONNEXION
        $mysqli = new mysqli('localhost', 'root', '', 'livreor');

        // Vérifier la connexion
        if ($mysqli->connect_error) {
            die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        // Récupérer la date et l'heure actuelles
        $current_date = date('Y-m-d H:i:s');

        // Préparer la requête SQL
        $stmt = mysqli_prepare($mysqli, "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES (?, ?, ?)");
        
        // Lier les paramètres
        mysqli_stmt_bind_param($stmt, 'sis', $comment, $user_id, $current_date); // 's' pour string, 'i' pour integer et 's' pour string

        // Exécuter la requête
        if (mysqli_stmt_execute($stmt)) {
            echo "Commentaire ajouté avec succès.";
        } else {
            echo "Erreur : " . mysqli_error($mysqli);
        }

        // Fermer la déclaration et la connexion
        mysqli_stmt_close($stmt);
        mysqli_close($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('./includes/_head.php') ?>

<body>

<?php include('./includes/_header.php')?>

    <h1>Page de Commentaires</h1>
    
    <form action="commentaires.php" method="POST">
        <textarea name="comment" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Envoyer">
    </form>

    <a href="./livre-or.php">Voir les commentaires</a>

    <?php include('./includes/_footer.php') ?>

</body>
</html>
