<!DOCTYPE html>
<!--
Muestra los números múltiplos de 5 de 0 a 100 utilizando un bucle for .
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       
        Este programa le mostrara los multiplos de 5 de 0 a 100:
       
        <?php
        for($i=0;$i<100;$i+=5){
            
            echo $i,", ";
        }
        ?>
    </body>
</html>
