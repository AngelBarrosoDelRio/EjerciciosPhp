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
         $nota1=$_GET[asig1];
         $nota2=$_GET[asig2];
         $nota3=$_GET[asig3];
         
         echo "La media de este curso es: ",($nota1+$nota2+$nota3)/3;
        ?>
    </body>
</html>
