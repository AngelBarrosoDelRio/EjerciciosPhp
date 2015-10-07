<!DOCTYPE html>
<!--
Escribe un programa que permita ir introduciendo una serie indeterminada de números hasta que la
suma de ellos supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado,
el contador de los números introducidos y la media.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            $n=$_POST[n];
            $suma=$_POST[suma];
            $cuentaNumeros=$_POST[cuentaNumeros];
            
            if(!isset($n)){
                
                $suma=0;
                $cuentaNumeros=-1;
                
            }
            if($suma<10000){
                
                $cuentaNumeros++;
                $suma+=$n;
            }
            if($cuentaNumeros==0){
        
                echo"Este programa le pedira que introduzca  numeros y terminara de
                solicitarlos cuando la suma de todos ellos sea superior a 1000:<br>";
            
                
            }
            if($suma<10001){
        ?>
        
        
        Introduce un número .
        <form action="SumaNumeros.php" method="post">
            <input type="number" name="n" autofocus>
            <input type="hidden" name="cuentaNumeros" value="<?php echo $cuentaNumeros; ?>">
            <input type="hidden" name="suma" value="<?php echo $suma; ?>">
            <input type="submit" value="Continuar">
        </form>  
        
        <?php
            
        
            }
            if($suma>=1001){
                echo "La suma de los numeros introducidos es: ",$suma,"<br>";
                echo "Ha introducido ",$cuentaNumeros," numeros por teclado <br>";
                echo "La media de los numeros sera: ".($suma/$cuentaNumeros),"<br>";
        ?>
        <br>
        <a href="SumaNumeros.php">VOLVER</a>
        <?php
            }
        ?>
           
    </body>
</html>
