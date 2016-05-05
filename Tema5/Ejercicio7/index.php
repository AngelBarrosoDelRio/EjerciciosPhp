<!DOCTYPE html>
<!--
Escribe un programa que genere 20 números enteros aleatorios entre 0 y 100 y que los almacene en
un array. El programa debe ser capaz de pasar todos los números pares a las primeras posiciones del
array (del 0 en adelante) y todos los números impares a las celdas restantes. Utiliza arrays auxiliares
si es necesario.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       
        
        for ($i = 0; $i < 20; $i++) { //cargar el arrays con numeros aleatorios
            $numero[] = rand(0,100);
        }
        echo "Array original: ";
        
        foreach ($numero as $n){ // muestra el array original
            echo $n,", ";
        }
        
        echo "<br><br>";
        
        echo"Array modificado: ";
        for ($i = 0; $i < 20; $i++) { //comprueba cuales son pares e impares
            
            if($numero[$i]%2==0){
                $par[$i]=$numero[$i]; // almaceno los numeros pares en otro array
                
            }else{
                $impar[$i]=$numero[$i]; // almaceno los impares en otro array
            }
            
        }
        foreach ($par as $primerosPuesto){ //muestra el resultado de los pares
            echo $primerosPuesto.", ";
        }
        foreach ($impar as $ultimosPuesto){ //muestra el resultado de los impares
            echo $ultimosPuesto.", ";
        }
        
        
        ?>
    </body>
</html>
