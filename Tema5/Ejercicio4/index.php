<!DOCTYPE html>
<!--
Escribe un programa que genere 100 números aleatorios del 0 al 20 y que los muestre por pantalla
separados por espacios. El programa pedirá entonces por teclado dos valores y a continuación
cambiará todas las ocurrencias del primer valor por el segundo en la lista generada anteriormente.
Los números que se han cambiado deben aparecer resaltados de un color diferente.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       
        
        <?php
        
        if(!isset($_GET['numeroText'])){
           
            for ($i = 0; $i < 100; $i++) {
                $arraysOriginal[$i] = rand(0, 20);
                echo $arraysOriginal[$i]." ";
            }

        $numeroText= implode(" ", $arraysOriginal);
            
        
        ?>
        <form action="index.php" method="get">
            Valor a sustituir: <input type="number" name ="viejo" autofocus="" required=""><br>
            Valor nuevo: <input type="number" name ="nuevo" required="">
            <input type="hidden" name="numeroText" value="<?php echo $numeroTexto; ?>">
            <input type="submit" value="aceptar">
        </form>
        
        <?php
        
            
        }else{
            $numeroText=$_GET['numeroText'];
            $viejo=$_GET['viejo'];
            $nuevo=$_GET['nuevo'];
            
            $arraysOriginal= explode(" ", $numeroText);
            
            foreach ($arraysOriginal as $n) {
                
                if ($n == $viejo) { 
                
                    echo "<span style=\"color: green; font-weight: bold;\">$nuevo</span> ";
                
                    
                } else {
                    
                    echo  "$n ";
                }         
            }
        }
        
            
        ?>
    </body>
</html>
