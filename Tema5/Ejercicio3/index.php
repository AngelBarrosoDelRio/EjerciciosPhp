<!DOCTYPE html>
<!--
Escribe un programa que lea 15 números por teclado y que los almacene en un array. Rota los
elementos de ese array, es decir, el elemento de la posición 0 debe pasar a la posición 1, el de la 1 a
la 2, etc. El número que se encuentra en la última posición debe pasar a la posición 0. Finalmente,
muestra el contenido del array.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $n=$_GET['n'];
        $cuentaNum=$_GET['cuentaNum'];
        $concatena=$_GET['concatena'];
                
        if(!isset($n)){
            $concatena="";
            $cuentaNum=0;
        }else{
            if($concatena==""){
                $concatena=$n;
            }else{
                $concatena=$concatena.' '.$n;
            }
            $cuentaNum++;
        }
        
        if(($cuentaNum<15)){
        ?>
        
        <form action="index.php" method="GET">
            Introduzca un numero:
            <input type="number" name="n" autofocus="">
            <input type="hidden" name="cuentaNum" value="<?= $cuentaNum ?>"><?php //el = es como e poner echo.?>
            <input type="hidden" name="concatena" value="<?php echo $concatena?>">
            <input type="submit" value="aceptar">
            
        <?php   
        }
        
        if($cuentaNum==15){
           
            $numero = explode(" ", $concatena);
        
        
            echo "arrays original: ";

            foreach ($numero as $n) { //muestra el array original
                
                echo $n.", ";
                
            }

            // roto el arrays.

            $aux = $numero[14]; 

            for ($i = 14; $i > 0; $i--){
                
                  $numero[$i] = $numero[$i - 1];

            }
            $numero[0] = $aux;

            echo "<br>";

            echo "array modificado: ";

            foreach ($numero as $n) {  //muestra el array modificado.
               
                echo $n.", ";
                
            }
        }// cierra del if.
        ?>
    </body>
</html>
