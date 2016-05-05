<!DOCTYPE html>
<!--
Escribe un programa que pida 10 números por teclado y que luego muestre los números introducidos
junto con las palabras “máximo” y “mínimo” al lado del máximo y del mínimo respectivamente.
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
        
        if(($cuentaNum<10)){
        ?>
        
        <form action="index.php" method="GET">
            Introduzca un numero:
            <input type="number" name="n" autofocus="">
            <input type="hidden" name="cuentaNum" value="<?= $cuentaNum ?>"><?php //el = es como e poner echo.?>
            <input type="hidden" name="concatena" value="<?php echo $concatena?>">
            <input type="submit" value="aceptar">
            
        <?php   
        }
        
        if($cuentaNum==10){
           $numero = explode(" ", $concatena);
           
            $maximo = -PHP_INT_MAX;
            $minimo = PHP_INT_MIN;
            
            foreach ($numero as $n) {
                
            
                if($n<$minimo){

                    $minimo=$n;

                }else if($n>$maximo){

                    $maximo=$n;
                }
            }
            
            foreach ($numero as $n) {
           
                    if ($n == $minimo) {
                    
                        echo "$n mínimo<br>";
                        
                    } else if ($n == $maximo) {
              
                        echo "$n máximo<br>";
                    
                            
                    } else {
              
                        echo "$n<br>";
                    }
            }
        }
        ?>
    </body>
</html>
