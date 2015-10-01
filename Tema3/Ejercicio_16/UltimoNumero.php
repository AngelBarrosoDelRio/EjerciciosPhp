<!DOCTYPE html>
<!--
Escribe un programa que diga cuál es la última cifra de un número entero introducido por teclado.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $nIntr=$_GET[n];
        
        echo "La ultima cifra introducida es: ", $nIntr%10;
        
        
        ?>
    </body>
</html>
