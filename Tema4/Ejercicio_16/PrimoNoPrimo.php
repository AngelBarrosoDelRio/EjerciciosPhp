<!DOCTYPE html>
<!--
Escribe un programa que diga si un número introducido por teclado es o no primo. Un número
primo es aquel que sólo es divisible entre él mismo y la unidad.Escribe un programa que diga si un número introducido por teclado es o no primo.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $n=$_POST[n];
        if(!isset($n)){// para comprobar que no este iniciado
        
        ?>
        
        <h1>Este programa le pide que introduzca un numero entero y le dirá si es o no primo.</h1><br>
        
        Introduce un número .
        <form action="PrimoNoPrimo.php" method="post">
            <input type="number" name="n" autofocus>
            <input type="submit" value="Continuar">
            </form>  
        
        <?php
       
        } else {
            
            $esPrimo=true;
            
            for ($i = 2; $i < $n; $i++) {
                
                if ($n % $i == 0) {
                    
                    $esPrimo = false;
                    
                }
            }
            //NO CONSIDERAMOS COMO PRIMOS EL 0 o 1.
            if(($n==0)||($n==1)){
                
                $esPrimo=false;
            }
            
        
        
            if($esPrimo){

                echo "El numero es primo";
            }else{

                echo "El numero no es primo";
            }
        }
        
        ?>
        <br>
        <a href="PrimoNoPrimo.php">>>VOLVER</a>
    </body>
</html>
