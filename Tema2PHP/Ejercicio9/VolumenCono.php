<!DOCTYPE html>
<!--
Escribe un programa que calcule el volumen de un cono mediante la fórmula V = 1/3 π r2 h.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
        $alturaIntr=$_GET[altura];
        $radioIntr=$_GET[radio];
        $pi=3.14;
        
        echo "El volumen del cono es igual a: ",(1/3*$pi)*($radioIntr*2)*$alturaIntr;
        
        ?>
       
    </body>
</html>
