<!DOCTYPE html>
<!--
Escribe un programa que utilice las variables $x y $y . Asignales los valores 144 y 999 respectiva-
mente. A continuación, muestra por pantalla el valor de cada variable, la suma, la resta, la división
y la multiplicación.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $x=144;
        $y=999;
        
        echo "'x'= " , $x ," e 'y'= " , $y;
        echo "suma: " , $x + $y , "<br>";
        echo "resta: " , $y-$x , "<br>";
        echo "division" , $x/$y , "<br>";
        echo "multiplicacion: " , $x*$y , "<br>";
        ?>
    </body>
</html>
