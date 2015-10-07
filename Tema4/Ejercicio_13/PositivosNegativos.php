<!DOCTYPE html>
<!--
Escribe un programa que lea una lista de diez números y determine cuántos son positivos, y cuántos
son negativos.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $n=$_POST[n];
        $i=$_POST[i];
        $positivos=$_POST[positivos];
        
        if(!isset($n)){
            $i=1;
            $positivos=0;
        }else {
            
            $i++;
        }
        if($n>=0){
           $positivos++; 
        }
        
        if($i==1){
            echo"Este programa le pedira que introduzca diez numeros y le "
            . "indicara cuantos son positivos y cuantos negativos";
        }
        
        if($i<=10){
        ?>
           Introduce un número .
           <form action="PositivosNegativos.php" method="post">
            <input type="number" name="n" autofocus>
            <input type="hidden" name="i" value="<?php echo $i; ?>">
            <input type="hidden" name="positivos" value="<?php echo $positivos; ?>">
            <input type="submit" value="Continuar">
            </form>  
        <?php
        
        }
        
        if($i==11){
            echo "Ha introducido ",($positivos)-1," numeros positivos y ",-($positivos-$i)," negativos";
        }
        ?>
        <br><br>
        <a href="index.php">>> Volver</a>
    </body>
</html>
