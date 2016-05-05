<!DOCTYPE html>
<!--
Realiza un programa que pida la temperatura media que ha hecho en cada mes de un determinado
año y que muestre a continuación un diagrama de barras horizontales con esos datos. Las barras
del diagrama se pueden dibujar a base de la concatenación de una imagen.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $temp=$_GET['temp'];
        $cuentaDias=$_GET['cuentaDias'];
        $concatena=$_GET['concatena'];
        
        if(!isset($temp)){
            $cuentaDias=0;
            $concatena="";
        }else{
            if($concatena==""){
                $concatena=$temp;
            }else{
                $concatena=$concatena.' '.$temp;
            }
            $cuentaDias++;
        }
        
        if($cuentaDias<12){
            
        ?>
        <form action="index.php" method="GET">
            Introduzca una temperatura:
            <input type="number" name="temp" autofocus="">
            <input type="hidden" name="cuentaDias" value="<?= $cuentaDias ?>"><?php //el = es como e poner echo.?>
            <input type="hidden" name="concatena" value="<?php echo $concatena?>">
            <input type="submit" value="aceptar">
        <?php
        }
        
        if($cuentaDias==12){
            echo "La grafica de las temperaturas medias de este año son: <br>";
            $temp=  explode(" ", $concatena);
            $j=1;
            
            foreach ($temp as $n){
                
                
                   
                    echo "El mes ",$j;

                    for($i=0;$i<$n;$i++){

                       echo"@";

                    }
                echo $n,"%";
                $j++;
                echo"<br>";
                
            }
        }
        ?>
    </body>
</html>
