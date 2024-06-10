<?php $title = "Se connecter"; // TITRE DE LA PAGE  


session_start();

$message = '';

// CONNECTING TO DB
// CHECKING IF THE METHOD IS POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Expression régulière pour valider l'adresse email

        $mysqli = mysqli_connect('localhost', 'root', '', 'livreor');

        if (!$mysqli) {
            die("Could not connect: " . mysqli_connect_error());
        }

        // Préparer la requête SQL
        $requete = $mysqli->prepare("SELECT id, login, password FROM utilisateurs WHERE login = ?");
        $requete->bind_param("s", $login);
        $requete->execute();
        $result = $requete->get_result();

        // Vérifier si l'utilisateur existe
    if ($result->num_rows > 0) { 
        $user_data = $result->fetch_assoc(); // ALORS CREER LA VARIABLE un tableau contenant les données de l'utilisateur

        // Vérifier le mot de passe
        if (password_verify($password, $user_data['password'])) { // COMPARE LES DEUX MDP
            // SI LE MDP EST CORRECT ALORS SAUVEGARDE LES IDENTIFIANTS EN MODE SESSION
            $_SESSION['user_id'] = $user_data['id'];
            $_SESSION['user_login'] = $user_data['login'];
            
            header("Location: profil.php");
            exit;
            // Redirige vers la page profil
        }
        
        else {
            $message = "Mot de passe ou identifiant incorrect.";
        }
    } else {
        $message = "Mot de passe ou identifiant incorrect.";
    }

    // Fermer la requête et la connexion
    $requete->close();
    mysqli_close($mysqli);
}


?>

<!DOCTYPE html>
<html lang="en">

<body>

<div>

    <form class="login-form" action="connexion.php" method="post">
            <h1>Se connecter</h1>
            <br />  
            <input type="text" name="login" placeholder="Nom d'utilisateur" required>
            <br />
            <input type="password" name="password" placeholder="Mot de passe" required>
            <br />
            <input type="submit" value="Se connecter">
    </form>
    <?php 
    if (!empty($message)) {
    echo "<p class=log_message'>" . $message . "</p>"; 
    }
    ?>

<a href="./inscription.php" class="alreadyLog">Vous n'êtes pas encore inscrit ?</a>

</div>


    
</body>
</html>