<!DOCTYPE html>
<!--
Realiza un programa que nos diga cuántos dígitos tiene un número entero que puede ser positivo o
negativo. Se permiten números de hasta 5 dígitos.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $numerIntr=$_GET[n];
        
        if($numerIntr<0){
            $numerIntr=$_GET[-(n)];
        }
        if(($numerIntr>=0)&&($numerIntr<10)){
            
            echo " El numero tiene 1 cifra.";
            
        }
        if(($numerIntr>=10)&&($numerIntr<100)){
            
            echo " El numero tiene 2 cifra.";
            
        }
        if(($numerIntr>=100)&&($numerIntr<1000)){
            
            echo " El numero tiene 3 cifra.";
            
        }
        if(($numerIntr>=1000)&&($numerIntr<10000)){
            
            echo " El numero tiene 4 cifra.";
            
        }
        if(($numerIntr>=10000)&&($numerIntr<100000)){
            
            echo " El numero tiene 5 cifra.";
            
        }
        ?>
    </body>
</html>
