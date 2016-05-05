<!DOCTYPE html>
<!--
Realiza un programa que pida 8 números enteros y que luego muestre esos números de colores, los
pares de un color y los impares de otro
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
        
        if($cuentaDias<8){
            
        ?>
        <form action="index.php" method="GET">
            Introduzca una temperatura:
            <input type="number" name="n" autofocus="">
            <input type="hidden" name="cuentaDias" value="<?= $cuentaDias ?>"><?php //el = es como e poner echo.?>
            <input type="hidden" name="concatena" value="<?php echo $concatena?>">
            <input type="submit" value="aceptar">
        <?php
        }
        
        if($cuentaDias==8){
            
            $n=  explode(" ", $concatena);
            
            foreach ($n as $num){
                
                if($num%2==0){
                    echo "<span style=\"color: green; font-weight: bold;\">$num,</span> ";
                }else{
                    echo "<span style=\"color: red; font-weight: bold;\">$num,</span> ";
                }
            }
            }
        ?>
    </body>
</html>
