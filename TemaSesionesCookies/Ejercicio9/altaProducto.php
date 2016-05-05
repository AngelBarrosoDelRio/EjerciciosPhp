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
        <h3>Nueva producto</h3><hr>
        <form action="administracionProducto.php" method="post">
            Nombre: <input type="text" name="nombre" autofocus=""><br>
            precio: <input type="number" name="precio" ><br>
            imagen: <input type="file" name="imagen" accept="/Downloads" value="archivos" ><br>
            detalle producto: <input type="text" name="detalle" ><br>
          <input type="submit" name="accion" value="alta">
        </form>
        <br><br>
    </body>
</html>