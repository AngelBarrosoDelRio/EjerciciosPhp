<!DOCTYPE html>
<!--
Rellena un array bidimensional de 6 filas por 9 columnas con números enteros positivos comprendi-
dos entre 100 y 999 (ambos incluidos). Todos los números deben ser distintos, es decir, no se puede
repetir ninguno. Muestra a continuación por pantalla el contenido del array de tal forma que se
cumplan los siguientes requisitos:
• Los números de las dos diagonales donde está el mínimo deben aparecer en color verde.
• El mínimo debe aparecer en color azul.
• El resto de números debe aparecer en color negro.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $min=999;
        
       
        for($i=0;$i<9;$i++){
            for($j=0;$j<6;$j++){
                
                do {
                    $n = rand(100, 999);
                } while (in_array($n, $arrayBidimensional));
                
                $arrayBidimensional[$i][$j]= $n ;
                
                if($arrayBidimensional[$i][$j]<$min){
                  $iMinimo = $i;
                  $jMinimo = $j; 
                  $min=$arrayBidimensional[$i][$j];
                }
        }
        
        }
       // print_r($arrayBidimensional);
        echo "<table>";
        for($i=0;$i<9;$i++){
            echo "<tr>";
            for($j=0;$j<6;$j++){
                if($arrayBidimensional[$i][$j]==$min){
                    
                    echo '<td><span style="color: blue; font-weight:bold">'.$min.' </span></td>';
                
                    
                }else if (abs((abs($i) - abs($iMinimo))) == abs((abs($j) - abs($jMinimo)))) {
                   
                    echo '<td><span style="color: red; font-weight:bold">'.$arrayBidimensional[$i][$j].' </span></td>';
                
                    
                } else {
                   
                    echo "<td>",$arrayBidimensional[$i][$j],"</td>";
                }
                
            }
            echo "</tr>";
            
        }
        echo "</table>";
        ?>
    </body>
</html>
