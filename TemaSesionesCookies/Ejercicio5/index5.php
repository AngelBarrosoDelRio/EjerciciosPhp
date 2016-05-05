<!DOCTYPE html>
<!--
Crea una tienda on-line sencilla con un catálogo de productos y un carrito de la compra. Un
catálogo de cuatro o cinco productos será suficiente. De cada producto se debe conocer al menos
la descripción y el precio. Todos los productos deben tener una imagen que los identifique. Al lado
de cada producto del catálogo deberá aparecer un botón Comprar que permita añadirlo al carrito.
Si el usuario hace clic en el botón Comprar de un producto que ya estaba en el carrito, se deberá
incrementar el número de unidades de dicho producto. Para cada producto que aparece en el carrito,
habrá un botón Eliminar por si el usuario se arrepiente y quiere quitar un producto concreto del
carrito de la compra. A continuación se muestra una captura de pantalla de una posible solución.
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
        <h3>Productos</h3><hr>
        <?php
        $productos=array(
                "Acer"=>array("nombre"=>"Acer Aspire","precio"=>550, "imagen"=>"Acer_Aspire.png"),
                "lenovo"=>array("nombre"=>"Lenovo g500","precio"=>750, "imagen"=>"lenovo_g550.jpg"),
                "sony"=>array("nombre"=>"Sony aspi","precio"=>620, "imagen"=>"portatil-sony.jpg"),
                "apple"=>array("nombre"=>"Apple macbook air","precio"=>980, "imagen"=>"portatil_apple_macbook_air.jpg"),
                "samsung"=>array("nombre"=>"Samsung serie 9","precio"=>615, "imagen"=>"samsung_series_9.jpg"),
            );
        
        foreach ($productos as $codigo => $elemento) {
          ?>
          <img src="/Ejercicio5/res/imagenes/<?=$elemento[imagen]?>" width="360" border="1"><br>
          <?=$elemento[nombre]?><br>Precio: <?=$elemento[precio]?> €
          <form action="index5.php" method="post">            
            <input type="hidden" name="codigo" value="<?=$codigo?>">
            <input type="hidden" name="accion" value="comprar">
            <input type="submit" value="Comprar">
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
        if (!isset($_SESSION['carrito'])) {
          $_SESSION['carrito'] = array ("Acer" => 0, "lenovo" => 0, "sony" => 0, "apple" => 0, "samsung" => 0);
        }

        if ($accion == "comprar") {
          $_SESSION['carrito'][$codigo]++;
        }

        if ($accion == "eliminar") {
          $_SESSION['carrito'][$codigo] = 0;
        }

        // Muestra el contenido del carrito
        $total = 0;
        foreach ($productos as $cod => $elemento) {
          if ($_SESSION['carrito'][$cod] > 0) {
            $total = $total + ($_SESSION['carrito'][$cod] * $elemento[precio]);
            ?>
            <img src="/Ejercicio5/res/imagenes/<?=$elemento[imagen]?>" width="200" border="1"><br>
            <?=$elemento[nombre]?><br>Precio: <?=$elemento[precio]?> €<br>
            Unidades: <?=$_SESSION['carrito'][$cod]?>
            <form action="index5.php" method="post">              
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
