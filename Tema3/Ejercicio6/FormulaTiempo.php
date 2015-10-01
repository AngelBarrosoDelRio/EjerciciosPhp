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
         $altura=$_GET[altura];
         $g=9.81;
         
         
         echo "El objeto cae a ",sqrt(($altura*2)/$g)," m/s";
         
        ?>
    </body>
</html>
