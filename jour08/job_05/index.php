<?php
// Initialisation du tableau représentant la grille
$grille = [
    ['-','-','-'],
    ['-','-','-'],
    ['-','-','-']
];

// Vérifie s'il y a un gagnant
function checkWinner($grille, $symbole) {
    // Vérification des lignes et des colonnes
    for ($i = 0; $i < 3; $i++) {
        if ($grille[$i][0] == $symbole && $grille[$i][1] == $symbole && $grille[$i][2] == $symbole) {
            return true;
        }
        if ($grille[0][$i] == $symbole && $grille[1][$i] == $symbole && $grille[2][$i] == $symbole) {
            return true;
        }
    }
    // Vérification des diagonales
    if ($grille[0][0] == $symbole && $grille[1][1] == $symbole && $grille[2][2] == $symbole) {
        return true;
    }
    if ($grille[0][2] == $symbole && $grille[1][1] == $symbole && $grille[2][0] == $symbole) {
        return true;
    }
    return false;
}

// Vérifie s'il y a match nul
function checkDraw($grille) {
    foreach ($grille as $ligne) {
        foreach ($ligne as $case) {
            if ($case == '-') {
                return false;
            }
        }
    }
    return true;
}

// Réinitialisation de la grille
function resetGrille() {
    return [
        ['-','-','-'],
        ['-','-','-'],
        ['-','-','-']
    ];
}

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupère les coordonnées de la case cliquée
    $ligne = $_POST['ligne'];
    $colonne = $_POST['colonne'];
    
    // Si la case est vide
    if ($grille[$ligne][$colonne] == '-') {
        // Détermine le symbole du joueur actuel
        $symbole = ($_POST['joueur'] == 'X') ? 'X' : 'O';
        // Met à jour la grille avec le symbole du joueur
        $grille[$ligne][$colonne] = $symbole;
        // Vérifie s'il y a un gagnant
        if (checkWinner($grille, $symbole)) {
            $message = "$symbole a gagné !";
            $grille = resetGrille();
        } elseif (checkDraw($grille)) {
            $message = "Match nul !";
            $grille = resetGrille();
        }
        // Change de joueur
        $_POST['joueur'] = ($_POST['joueur'] == 'X') ? 'O' : 'X';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Morpion</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            width: 50px;
            height: 50px;
            border: 1px solid black;
            text-align: center;
            font-size: 24px;
            cursor: pointer;
        }
        #message {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Jeu du Morpion</h1>
    <?php if (isset($message)): ?>
        <div id="message"><?php echo $message; ?></div>
    <?php endif; ?>
    <form action="" method="post">
        <table>
            <?php for ($i = 0; $i < 3; $i++): ?>
                <tr>
                    <?php for ($j = 0; $j < 3; $j++): ?>
                        <td>
                            <input type="hidden" name="ligne" value="<?php echo $i; ?>">
                            <input type="hidden" name="colonne" value="<?php echo $j; ?>">
                            <input type="hidden" name="joueur" value="<?php echo (isset($_POST['joueur'])) ? $_POST['joueur'] : 'X'; ?>">
                            <?php if ($grille[$i][$j] == '-'): ?>
                                <button type="submit" name="submit"><?php echo $grille[$i][$j]; ?></button>
                            <?php else: ?>
                                <?php echo $grille[$i][$j]; ?>
                            <?php endif; ?>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
    </form>
</body>
</html>
