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
        
        $boletin=($nota1+$nota2+$nota3)/3;
        
        if($boletin<5){
            
            echo"Ha obtenido de memdia en el curso un ",$boletin," : Insuficiente";
            
        } else if(($boletin>=5)&&($boletin<7)){
            
            echo "Ha obtenido de memdia en el curso un ",$boletin," : Suficiente";
            
        }else if(($boletin>=7)&&($boletin<8)){
            
            echo "Ha obtenido de memdia en el curso un ",$boletin," : Bien";
            
        }else if(($boletin>=8)&&($boletin<9)){
            
            echo "Ha obtenido de memdia en el curso un ",$boletin," : Notable";
            
        }else if(($boletin>=9)&&($boletin<=10)){
            
            echo "Ha obtenido de memdia en el curso un ",$boletin," : Sobresaliente";
        }
        ?>
    </body>
</html>
