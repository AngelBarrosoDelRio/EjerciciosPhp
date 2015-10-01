<!DOCTYPE html>
<!--
Escribe un programa que ordene tres números enteros introducidos por teclado.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $n1=$_GET[nu1];
        $n2=$_GET[nu2];
        $n3=$_GET[nu3];
        
        if($n1>$n2){
            $aux=$n1;
            $n1=$n2;
            $n2=$aux;
        }
        if($n2>$n3){
           $aux=$n2;
           $n2=$n3;
           $n3=$aux; 
        }
        if($n1>$n2){
            $aux=$n1;
            $n1=$n2;
            $n2=$aux;
        }
        
        echo "los numeros introducidos ordenados por tamaño es: ",$n1,", ",$n2,", ",$n3;
        
        ?>
    </body>
</html>
