<!DOCTYPE html>
<!--
Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras
su suma no supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado,
el contador de los números introducidos y la media. Utiliza sesiones.
-->
<?php

        session_start();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        

        <p>
          Este programa calcula la media, la suma y la cantidad de los números introducidos.<br>
          Vaya introduciendo números (el programa parará cuando la suma de ellos sea mayor a 1000).
        </p>
        <?php
          $n = $_POST['n'];
          if (!isset($n)){
              $_SESSION['cuentaNumeros']=0;
              $_SESSION['sumaNum']=0;
          }else{
              $_SESSION['sumaNum']+=$n;
              $_SESSION['cuentaNumeros']++;

          }
          if (!isset($n) || ($_SESSION['sumaNum'] < 1000)) {

            ?>
            <form action="index3.php" method="post">
              <input type="hidden" name="ejercicio" value="01">
              <input type="number" name="n" autofocus>
              <input type="submit" value="Aceptar">
            </form>   
            <?php
            }
            if($_SESSION['sumaNum']>= 1000){
                echo "Ha introducido  " . $_SESSION['cuentaNumeros'] . " numeros.<br>";
                echo "La suma de los todos los numeros introdicidos es:  " . $_SESSION['sumaNum'] . "<br>";
                echo "La media de los numeros introducidos es:  " . $_SESSION['sumaNum']/$_SESSION['cuentaNumeros'] . "<br>";
                session_destroy();             
                  
            }
            ?>
    </body>
</html>
