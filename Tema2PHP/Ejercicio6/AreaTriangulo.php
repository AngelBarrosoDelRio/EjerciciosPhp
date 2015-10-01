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
        $alturaIntr=$_GET[altura];
        $baseIntr=$_GET[base];
        
        echo "el area del rectangulo es: ", ($alturaIntr*$baseIntr)/2;       
        ?>
    </body>
</html>
