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
        <link type="text/css" rel="stylesheet" href="/EJercicio3/res/css/cssTiendaOnline.css">
        <title></title>
    </head>
    <body>
        <?php
        
        
        echo "<table>"; 
        foreach ($_SESSION['producto'] as $cod => $elemento) {
        ?>
        <tr><td><img src="/EJercicio3/res/img/<?=$elemento['imagen']?>" width="360" border="1"><br></td>
            <td><?=$elemento['nombre']?></td>
            <td>Precio: <?=$elemento['precio']?> € </td>
            <td>Stock: <?=$elemento['stock']?> Unidades </td>
            <td>
                <form action="index.php" method="post">
              <input type="hidden" name="codigo" value="<?=$cod?>">
              <input type="submit" name="accion" value="eliminar">
            </form>
            </td>
            <td>
            <form action="modificaProducto.php" method="post">
              <input type="hidden" name="codigo" value="<?=$cod?>">
              <input type="hidden" name="nombre" value="<?=$elemento['nombre']?>">
              <input type="hidden" name="precio" value="<?=$elemento['precio']?>">
              <input type="hidden" name="imagen" value="<?=$elemento['imagen']?>">
              <input type="hidden" name="descripcion" value="<?=$elemento['descripcion']?>">
              <input type="hidden" name="stock" value="<?=$elemento['stock']?>">
              <input type="submit" value="modificar">
            </form>
            </td></tr>
        <?php    
        }
        
            
          
                
                
        
        ?>
        </table>
        

        <hr><table><tr>
        
        <td>
        <form action="altaProducto2.php" method="post">
          <input type="submit" value="Añadir nuevo producto">
        </form>
        </td>
        
        <td>
        <form action="index.php" method="post">
          <input type="submit" name="accion"  value="Volver al principio">
        </form>
        </td>

        </tr></table>
        
    </body>
</html>
