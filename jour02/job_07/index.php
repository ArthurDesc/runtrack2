<?php
$hauteur = 5;

for ($i = 1; $i <= $hauteur; $i++) {
    for ($j=$i; $j<$hauteur; $j++) {
        echo "&nbsp;&nbsp;";
    }

    for ($j=1; $j<= (2*$i-1); $j++) {
    if ($j==1 || $j==(2*$i-1)||$i==$hauteur) {
        echo "*";
    } else {
        echo "&nbsp;&nbsp;";
    }
} 
        echo "<br />";
    }
?>
