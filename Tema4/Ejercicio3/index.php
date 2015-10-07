<!DOCTYPE html>
<!--
Muestra los números múltiplos de 5 de 0 a 100 utilizando un bucle (do while). 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        Este programa le mostrara los multiplos de 5 de 0 a 100:
        
        <?php
        $i=0;
        
        do{
            
            echo $i,", ";
            $i+=5;
        }while($i<100);
        ?>
    </body>
</html>
