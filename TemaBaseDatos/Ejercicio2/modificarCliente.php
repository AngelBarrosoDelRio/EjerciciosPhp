<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
        $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
        
        // obtiene los valores de cada uno de los campos del cliente que vamos a modificar
        $accion = $_POST['accion'];
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
       
        
        
        ?>
        
        <form action="index.php" method="post">
                dni:        <input type="number" name="dni" value="<?=$dni?>"><br>
              nombre:       <input type="text" name="nombre" value="<?=$nombre?>"><br>
              direccion:    <input type="text" name="direccion" value="<?=$direccion?>"><br>
              telefono:     <input type="number" name="telefono" value="<?=$telefono?>"><br>
                            <input type="hidden" name="accion" value="modificar">
                            <input type="submit" value=" guardar modificacion">
            </form><br>
    </body>
</html>
