<?php 
$dict = ["a", "e", "i", "o", "u", "y", "A", "E", "I", "O", "U", "Y",
"b", "c", "d", "f", "g", "h", "j", "k", "l", "m", "n", "p", "q", "r", "s",
"t", "v", "w", "x", "z", "B", "C", "D", "F", "G", "H", "J", "K", "L", "M",
"N", "P", "Q", "R", "S", "T", "V", "W", "X", "Z"];

function occurences($str, $char) {
        $count=0; 
        for ($i = 0; isset($str[$i]); $i++) {
            if ($str[$i] == $char) {
                $count++;
            }
        }
        return $count; 
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
echo occurences("Bonjour", "o");

?>
</body>
</html>