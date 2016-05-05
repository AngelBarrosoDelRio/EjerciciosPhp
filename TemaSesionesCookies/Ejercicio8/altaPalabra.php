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
        <h3>Nueva palabra</h3><hr>
        <form action="administracionPalabras.php" method="post">
          Español: <input type="text" name="espanol" autofocus=""><br>
          Inglés: <input type="text" name="ingles"><br>
          <input type="submit" name="accion" value="alta">
        </form>
        <br><br>
    </body>
</html>
