<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="/EJercicio3/res/css/cssTiendaOnline.css">
        <title></title>
    </head>
    <body>
        <?php
        $cod = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];
        $descripcion = $_POST['descripcion'];
        $sotck=$_POST['stock'];
        ?>
        <form action="index.php" method="post">
            Codigo: <input type="number" name="codigo" value="<?=$cod?>" readonly="">
            Nombre: <input type="text" name="nombre" value="<?=$nombre?>">
            Precio: <input type="number" name="precio" value="<?=$precio?>">
            Imagen: <input type="text" name="imagen" value="<?=$imagen?>">
            descripcion: <input type="text" name="descripcion" value="<?=$descripcion?>">
            stock: <input type="text" name="stock" value="<?=$sotck?>">
                    <input type="hidden" name="accion" value="modificar">
                    <input type="submit" value="modificar">
            </form>
        
    </body>
</html>
