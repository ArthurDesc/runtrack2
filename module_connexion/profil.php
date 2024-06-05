    <?php
    session_start();
    $message = 'Connectez vous pour accéder à votre profil ';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST['login'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $mot_de_passe = $_POST['mot_de_passe'];


        // Connexion à la base de données
        $mysqli = mysqli_connect("localhost", "root", "", "moduleconnexion");
        if (!$mysqli) {
            die("Échec de la connexion : " . mysqli_connect_error());
        }

        // Préparer et exécuter la requête SQL pour sélectionner l'utilisateur
        $request = $mysqli->prepare("SELECT id, prenom, nom, FROM utilisateurs WHERE login = ?"); 
        $request->bind_param("s", $login); // ATTRIBUT LE TYPE STRING A LA VARIABLE LOGIN
        $request->execute(); 
        $result = $request->get_result(); // ON CREER UNE VARIABLE POUR LUI DONNER LE RESULT DE NOTRE REQUETE

        // Vérifier si l'utilisateur existe
        if ($result->num_rows > 0) { 
            $user_data = $result->fetch_assoc();

            // Vérifier le mot de passe entre celui fourni et celui haché dans la base de donné
            if (password_verify($password, $user_data['password'])) {
                // Mot de passe correct, démarrer la session utilisateur
                $_SESSION['user_id'] = $user_data['id'];
                $_SESSION['user_name'] = $user_data['prenom'];
                
                // Rediriger vers une page protégée ou une page d'accueil
                header("Location: profil.php");
                exit;

            } elseif ($login == "admin" && $password == "admin") {
                    header("Location: admin.php");
            } else {
                $message = "Mot de passe incorrect.";
            }
        } else {
            $message = "Aucun utilisateur trouvé avec ce login.";
        }

        // Fermer la requête et la connexion
        $request->close();
        mysqli_close($mysqli);
    }
    ?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
    </head>
    <body>
        <a href="./index.php">Accueil</a>
        <h1>Modifier mon profil</h1>
        <form method="post" action="profil.php">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($login); ?>" readonly><br><br>
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($prenom); ?>" required><br><br>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($nom); ?>" required><br><br>
            <label for="mot_de_passe">Nouveau mot de passe (laissez vide pour ne pas changer):</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe"><br><br>
            <button type="submit">Mettre à jour</button>
        </form>
        
        <?php if ($message): 
            echo "<p>" . htmlspecialchars($message) . "</p>"; 
            endif;
        ?>

    </body>
    </html> 
