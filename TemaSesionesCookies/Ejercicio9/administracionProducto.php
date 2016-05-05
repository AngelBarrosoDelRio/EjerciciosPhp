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
        
        $codigo=$_POST['codigo'];
        
        if($_POST['accion']=="alta"){
            $_SESSION['producto'][$codigo][nombre]=$_POST['nombre'];
            $_SESSION['producto'][$codigo][precio]=$_POST['precio'];
            $_SESSION['producto'][$codigo][imagen]=$_POST['imagen'];
            $_SESSION['producto'][$codigo][detalle]=$_POST['imagen'];
        }
        if($_POST['accion']=="modificar"){
            $_SESSION['producto'][$codigo][precio]=$_POST['precio'];
        }
        if($_POST['accion']=="eliminar"){
            unset($_SESSION['producto'][$_POST['codigo']]);
            setcookie($_POST['codigo'], NULL, -1);
        }
        
        echo "<table>"; 
        foreach ($_SESSION['producto'] as $cod => $elemento) {
        ?>
        <tr><td><img src="/Ejercicio9/res/imagenes/<?=$elemento[imagen]?>" width="360" border="1"><br></td>
            <td><?=$elemento['nombre']?></td>
            <td>Precio: <?=$elemento[precio]?> € </td>
            <td>
                <form action="administracionProducto.php" method="post">
              <input type="hidden" name="codigo" value="<?=$cod?>">
              <input type="submit" name="accion" value="eliminar">
            </form>
            </td>
            <td>
            <form action="modificarProducto.php" method="post">
              <input type="hidden" name="codigo" value="<?=$cod?>">
              <input type="submit" value="modificacion">
            </form>
            </td></tr>
        <?php    
        }
        ?>
        </table>

        <hr><table><tr>
        
        <td>
            <form action="altaProducto.php" method="post">
          <input type="submit" value="Añadir nuevo producto">
        </form>
        </td>
        
        <td>
            <form action="administracionCookieeProductos.php" method="post">
          <input type="hidden" name="accion" value="borrarCookies">
          <input type="submit" value="Borrar todo los cambios">
        </form>
        </td>
        <td>
            <form action="administracionCookieeProductos.php" method="post">          
          <input type="hidden" name="accion" value="actualizarCookies">
          <input type="submit" value="Guardar cambios">
        </form>
        </td>
        <td>
            <form action="index9.php" method="post">
          <input type="submit" name="accion"  value="Volver al principio">
        </form>
        </td>

        </tr></table>
    </body>
</html>
