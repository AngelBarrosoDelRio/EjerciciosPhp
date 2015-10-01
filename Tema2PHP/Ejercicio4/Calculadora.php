<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $numero1=$_GET[numero1];
        $numero2=$_GET[numero2];  
        ?>
        <?php echo "suma= ", $numero1+$numero2;?> <br>
        <?php echo "multiplicacion= ", $numero1*$numero2;?><br>
        <?php echo "resta= ",$numero1-$numero2;?><br>
        <?php echo "division= ",$numero1/$numero2;?><br>
        
    </body>
</html>
