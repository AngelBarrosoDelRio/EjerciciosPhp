<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
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
       <h3>Modificación</h3><hr>
        <?php
          $espanol = $_POST['espanol'];
          $ingles = $_SESSION['diccionario'][$espanol];
        ?>
       <form action="administracionPalabras.php" method="post">
          <input type="hidden" name="ejercicio" value="08_admin_palabras">
          Español: <input type="text" name="espanol" value="<?=$espanol?>" readonly="readonly"><br>
          Inglés: <input type="text" name="ingles" value="<?=$ingles?>" autofocus=""><br>
          <input type="submit" name="accion"  value="modificacion">
        </form>
        <br><br>
    </body>
</html>
