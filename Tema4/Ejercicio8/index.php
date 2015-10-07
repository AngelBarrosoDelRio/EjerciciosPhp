<!DOCTYPE html>
<!--
Muestra la tabla de multiplicar de un número introducido por teclado. El resultado se debe mostrar
en una tabla ( <table> en HTML).
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        Introduce un número .
            <form action="index.php" method="post">
            <input type="number" min=0 max=10 name="n" autofocus>
            <input type="submit" value="Continuar">
            </form>
            
            
        
       
        <table>
          <?php
            $n=$_POST[n];
            
            echo "Tabla del $n<br><br>";
            
            for ($i = 0; $i < 11; $i++) {
              
                echo "<tr><td>$n x $i = ".$n*$i."</tr></td>";
            }
            
          ?>
        </table>
       
            <br><br>
        <a href="index.php">>> Volver</a>
    </body>
</html>
