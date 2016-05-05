<!DOCTYPE html>
<!--
Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
teclado. A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha
terminado de introducir los datos cuando meta un número negativo. Utiliza sesiones.

-->
<?php

session_start();

?>
        
<p>
  Este programa calcula la media de los números positivos introducidos.<br>
  Vaya introduciendo números (puede parar introduciendo un número negativo).
</p>
<?php
  $n = $_POST['n'];

  if (!isset($n) || ($n > 0)) {
    $_SESSION['total'] += $n;
    $_SESSION['cuentaNumeros']++;
    ?>
    <form action="index.php" method="post">
      <input type="hidden" name="ejercicio" value="01">
      <input type="number" name="n" autofocus>
      <input type="submit" value="Aceptar">
    </form>   
    <?php
  } else {
  ?>
    <p>
      La media de los números introducidos es <?php echo $_SESSION['total'] / ($_SESSION['cuentaNumeros'] - 1); ?>
    </p>
    <?php
    session_destroy();
  }
?>