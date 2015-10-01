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
        $horasIntr=$_GET[horas];
        $salaXhoras=12;
        $salExtra=16;
        
        if($horasIntr<=40){
            echo " Su salario esta semana es: ",$horasIntr*$salaXhoras," €";
        } else if($horasIntr>40){
            echo "Su salario esta semana es: ",$horasIntr*$salExtra," € por que esta semana ha trabajado ",$horasIntr-40," horas extras";
        }
        ?>
    </body>
</html>
