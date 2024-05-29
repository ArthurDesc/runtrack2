<?php
function calcule($a, $operation, $b) {
    if ($operation == '-') {
        return $a-$b;
    }
        elseif ($operation == '+') {
            return $b+$a;
        }
        elseif ($operation == '*') {
            return $b*$a;
        }
        elseif ($operation == '/') {
            return $b/$a;
        }
        elseif ($operation == '%') {
            return $b%$a;
        } else {
            echo "Entrez une valeur correct";
    
}
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php echo calcule(7,'-',9); ?>
    
    
</body>
</html>