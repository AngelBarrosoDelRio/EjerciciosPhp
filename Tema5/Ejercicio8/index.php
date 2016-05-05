<!DOCTYPE html>
<!--
Realiza un programa que pida 10 números por teclado y que los almacene en un array. A
continuación se mostrará el contenido de ese array junto al índice (0 – 9) utilizando para ello una
tabla. Seguidamente el programa pasará los primos a las primeras posiciones, desplazando el resto
de números (los que no son primos) de tal forma que no se pierda ninguno. Al final se debe mostrar
el array resultante.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $n=$_GET['n'];
        $cuentaDias=$_GET['cuentaDias'];
        $concatena=$_GET['concatena'];
        
        if(!isset($n)){
            $cuentaDias=0;
            $concatena="";
        }else{
            if($concatena==""){
                $concatena=$n;
            }else{
                $concatena=$concatena.' '.$n;
            }
            $cuentaDias++;
        }
        
        if($cuentaDias<10){
            
        ?>
        <form action="index.php" method="GET">
            Introduzca un numero:
            <input type="number" name="n" autofocus="">
            <input type="hidden" name="cuentaDias" value="<?= $cuentaDias ?>"><?php //el = es como e poner echo.?>
            <input type="hidden" name="concatena" value="<?php echo $concatena?>">
            <input type="submit" value="aceptar">
        <?php
        }
        
        if($cuentaDias==10){
            
            $numero= explode(" ", $concatena);
            
            for($i=0;$i<10;$i++){ //para comprobar en todo el array $numero
                
                $esPrimo=true; // damo como valor inicial que siempre sera primo
                for ($j = 2; $j < $numero[$i]; $j++) {
                    
                    
                    if (($numero[$i] % $j) == 0) { //comprobamos que se cumpla o no que sea primo

                        $esPrimo = false;

                    }
                    
                }
                if($esPrimo){ //una vez comprobado que sea falso o verdadero lo almacenamos en arrays diferentes.
                   
                    $primo[$i]=$numero[$i];      
               
                }  else {
                   
                    $noPrimo[$i]=$numero[$i]; 
                }

            }
            // sacamos el resultado.
            foreach ($primo as $primerosPuestos){
                echo $primerosPuestos.", ";
            }
            foreach ($noPrimo as $ultimPuestos){
                echo $ultimPuestos.", ";
            }
        }
        ?>
    </body>
</html>
