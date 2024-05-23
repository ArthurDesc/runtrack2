<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $val0 = 98;
        $val1 = 173;
        $val2 = 171;
        $val3 = 200;
        $val4 = 204;
        $val5 = 404;
        $val6 = 459;

        $numbers = array ($val0, $val1, $val2, $val3, $val4, $val5, $val6);


        foreach ($numbers as $val) {

        if ($val % 2 == 0) {
        echo "pair <br />";

        } else {
            echo "impair <br />";
        }
    }

        
    ?>



        <table border="1">
            <tr>
                <th><?php echo $val0 ?></th>
                <th><?php echo $val1 ?></th>
                <th><?php echo $val2 ?></th>
                <th><?php echo $val3 ?></th>
                <th><?php echo $val4 ?></th>
                <th><?php echo $val5 ?></th>
                <th><?php echo $val6 ?></th>
            </tr>   
            <tr>
                <td><?php echo $val0 ?></td>
                <td><?php echo $val1 ?></td>
                <td><?php echo $val2 ?></td>
                <td><?php echo $val3 ?></td>
                <td><?php echo $val4 ?></td>
                <td><?php echo $val5 ?></td>
                <td><?php echo $val6 ?></td>
            </tr>   
            
            


        </table>




</body>
</html>