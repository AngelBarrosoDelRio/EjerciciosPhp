<!DOCTYPE html>
<!--
Realiza un programa que sea capaz de rotar todos los elementos de una matriz cuadrada una posición
en el sentido de las agujas del reloj. La matriz debe tener 12 filas por 12 columnas y debe contener
números generados al azar entre 0 y 100. Se debe mostrar tanto la matriz original como la matriz
resultado, ambas con los números convenientemente alineados.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>
        <?php
        
       
        for($i=0;$i<12;$i++){
            for($j=0;$j<12;$j++){
                
                do {
                    $n = rand(100, 999);
                } while (in_array($n, $arrayBidimensional));
                $arrayBidimensional[$i][$j]=$n;
            }
            
        }
        echo '<table class="tabla" border="1" >';
        echo "<tr>";
        for($i=1;$i<=12;$i++){
            echo"<td>",$i,"</td>";
        }
        echo "</tr>";
        for($i=1;$i<=12;$i++){
            
            for($j=0;$j<12;$j++){
                
                echo "<td>",$arrayBidimensional[$i][$j],"</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        
        for($capa = 0; $capa < 6; $capa++) {
			
			// rota por arriba
			$aux1 = $arrayBidimensional[$capa][11 - $capa];
			for ($i = 11 - $capa; $i > $capa; $i--){
				$arrayBidimensional[$capa][$i] = $arrayBidimensional[$capa][$i - 1];
                        }	
			// rota por la derecha			
			$aux2 = $arrayBidimensional[11 - $capa][11 - $capa];
			for ($i = 11 - $capa; $i > $capa + 1; $i--){
				$arrayBidimensional[$i][11 - $capa] = $arrayBidimensional[$i - 1][11 - $capa];
                        }
			$arrayBidimensional[$capa + 1][11 - $capa] = $aux1;
			
			// rota por abajo
			$aux1 = $arrayBidimensional[11 - $capa][$capa];
			for ($i = $capa; $i < 11 - $capa - 1; $i++){
				$arrayBidimensional[11 - $capa][$i] = $arrayBidimensional[11 - $capa][$i + 1];
                        }
			$arrayBidimensional[11 - $capa][11 - $capa - 1] = $aux2;
				
			// rota por la izquierda
			for ($i = $capa; $i < 11 - $capa - 1; $i++){
				$arrayBidimensional[$i][$capa] = $arrayBidimensional[$i + 1][$capa];
                        }
			$arrayBidimensional[11 - $capa - 1][$capa] = $aux1;

        } // for capa
        
        echo '<table class="tabla" border="1" >';
        echo "<tr>";
        for($i=1;$i<=12;$i++){
            echo"<td>",$i,"</td>";
        }
        echo "</tr>";
        for($i=1;$i<=12;$i++){
            
            for($j=0;$j<12;$j++){
                
                echo "<td>",$arrayBidimensional[$i][$j],"</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
                
        ?>
    </body>
</html>
