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
        <?php
        //include 'varsProductos.php';
        ?>
        
       <h3>Modificación</h3><hr>
        <?php
          $cod = $_POST['codigo'];
          
          $precio = $_SESSION['producto'][$cod];
        ?>
       <form action="administracionProducto.php" method="post">
          
          nombre: <input type="text" name="codigo" value="<?=$cod?>" readonly="readonly"><br>
          precio: <input type="number" name="precio" value="<?=$precio?>" autofocus=""><br>
          <input type="submit" name="accion"  value="modificar">
        </form>
        <br><br>
    </body>
</html>
