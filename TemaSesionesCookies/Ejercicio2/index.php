<!DOCTYPE html>
<!--
Realiza un programa que vaya pidiendo números hasta que se introduzca un numero negativo y
nos diga cuantos números se han introducido, la media de los impares y el mayor de los pares. El
número negativo sólo se utiliza para indicar el final de la introducción de datos pero no se incluye
en el cómputo. Utiliza sesiones.
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
      Este programa calcula la media de los números positivos introducidos.<br>
      Vaya introduciendo números (puede parar introduciendo un número negativo).
    </p>
    <?php
      $n = $_POST['n'];
      if (!isset($n)){
          $_SESSION['cuentaNumeros']=0;
          $_SESSION['sumaImpares']=0;
          $_SESSION['cuentaImpares']=0;
          
      }
      if (!isset($n) || ($n > 0)) {
        
        ?>
        <form action="index.php" method="post">
          <input type="hidden" name="ejercicio" value="01">
          <input type="number" name="n" autofocus>
          <input type="submit" value="Aceptar">
        </form>   
        <?php
      }
          
        if(isset ($n)){
             if ($n >= 0) {
                $_SESSION['cuentaNumeros']++;

                if (($n % 2) == 0) { // Par
                    if ($n > $_SESSION['mayorPar']) {
                        $_SESSION['mayorPar'] = $n;
                    }
                } else { // Impar
                    $_SESSION['sumaImpares'] += $n;
                    $_SESSION['cuentaImpares']++;
                }
            } else {
            echo "<br><br>Ha introducido " . $_SESSION['cuentaNumeros'] . " números.<br>";
            echo "La media de los impares es " . $_SESSION['sumaImpares'] / $_SESSION['cuentaImpares'] . "<br>";
            echo "El mayor de los pares es " . $_SESSION['mayorPar'] . "<br>";
            session_destroy();             
            }
        }
      
        
        ?>
    </body>
</html>
