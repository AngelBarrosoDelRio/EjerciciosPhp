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
        $hora=$_GET[horas];
        $minutos=$_GET[minutos];
        $segundosDia=86400;
        
        $horPasaMinutos=$hora*60;
        $minutosTotales=($horPasaMinutos+$minutos)*60;
        $segundosFinalDia=$segundosDia-$minutosTotales;
        
        echo "Quedan exactamente ",$segundosFinalDia," segundos para la media noche";
        ?>
    </body>
</html>
