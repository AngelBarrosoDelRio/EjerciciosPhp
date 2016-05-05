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
        <title>Tienda on-line</title>
    </head>
    <body>
        <h3 style="text-align: center">Tienda on-line <b><i><u>Tu portatil</u></i></b></h3>
        <table style="border: 2px; margin: 0px 30px 0px 30px;"><tr><td>
        <hr>
        <h2>¿Desea administrar los productos?</h2>
        <form action="administracionProducto.php" method="post">
            <input type="hidden" name="administracionProducto">
            <input type="submit" value="Administraci'on Productos">
        </form>
        <h3>Productos</h3><hr>
        <?php
        if(!isset($_SESSION['producto'])){
           $productos=include 'varsProductos.php'; 
        }
        
        $productos=$_SESSION['producto'];
        foreach ($productos as $codigo => $elemento) {
          ?>
          <img src="/Ejercicio9/res/imagenes/<?=$elemento[imagen]?>" width="360" border="1"><br>
          <?=$elemento[nombre]?><br>Precio: <?=$elemento[precio]?> €
          <form action="index9.php" method="post">            
            <input type="hidden" name="codigo" value="<?=$codigo?>">
            <input type="hidden" name="accion" value="comprar">
            <input type="submit" value="Comprar">
          </form><br>
          <form action="detalleProducto.php" method="post">            
            <input type="hidden" name="codigo" value="<?=$codigo?>">
            <input type="hidden" name="accion" value="detalle">
            <input type="submit" value="mas detalles">
          </form><br><br>
        <?php
        }// cierre foreach.
        
        ?>
        </td><td>			
        <h3>Carrito</h3><hr>

        <?php // Carrito ///////////////////////////////////////////////////////
        
        $accion = $_POST['accion'];
        $codigo = $_POST['codigo'];

        // Inicializa el carrito la primera vez
        if (!isset($_SESSION[carrito])) {
          $_SESSION[carrito] = array ("Acer" => 0, "lenovo" => 0, "sony" => 0, "apple" => 0, "samsung" => 0);
        }

        if ($accion == "comprar") {
          $_SESSION[carrito][$codigo]++;
        }

        if ($accion == "eliminar") {
          $_SESSION[carrito][$codigo] = 0;
        }

        // Muestra el contenido del carrito
        $total = 0;
        foreach ($productos as $cod => $elemento) {
          if ($_SESSION[carrito][$cod] > 0) {
            $total = $total + ($_SESSION[carrito][$cod] * $elemento[precio]);
            ?>
            <img src="/Ejercicio9/res/imagenes/<?=$elemento[imagen]?>" width="200" border="1"><br>
            <?=$elemento[nombre]?><br>Precio: <?=$elemento[precio]?> €<br>
            Unidades: <?=$_SESSION[carrito][$cod]?>
            <form action="index9.php" method="post">              
              <input type="hidden" name="codigo" value="<?=$cod?>">
              <input type="hidden" name="accion" value="eliminar">
              <input type="submit" value="Eliminar">
            </form><br><br>
            <?php
          }
        }
        ?>
        <b>Total: <?=$total?> €</b>
        </td>
        </tr>
      </table>
          
    </body>
</html>


