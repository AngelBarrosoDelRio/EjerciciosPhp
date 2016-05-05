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
        
        <hr><h3>FACTURA</h3><hr>   
        <?php
            try {
                $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
                //echo "Se ha establecido una conexión con el servidor de bases de datos.<br>";
            } catch (PDOException $e) {
                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                die ("Error: " . $e->getMessage());
            }
            $consulta = $conexion->query("SELECT cod, descripcion, precio_compra, precio_venta, stock FROM articulos");
            while ($registro = $consulta->fetchObject()) {
            //echo $registro->imagen;
            $producto[$registro->cod] = array(
              "descripcion" => $registro-> descripcion,
              "precio_compra" => $registro-> precio_compra,
              "precio_venta" => $registro-> precio_venta,
              "stock" => $registro-> stock
              
            );
        }
        $_SESSION['producto'] = $producto;
        // muestra la factura
        echo "<div class='facturaMuestra'>";
        //echo "<h3>FACTURA</h3>";
        foreach ($producto as $cod => $elemento) {

              if ($_SESSION[factura][$cod] > 0) {
                $cantidadComprada=$_SESSION[factura][$cod];
                //$precioXproducto=$elemento[precio_venta]*$cantidadComprada;
                $total = $total + ($_SESSION[factura][$cod] * $elemento[precio_venta]);
                /*echo "sesion cod: ".$_SESSION[factura][$cod];
                echo "codigo: ".$cod;
                echo "sesion a secas: ".($_SESSION[factura][$cod] * $elemento[precio_venta]);
                echo "cantidad: ".$cantidadComprada;
                echo "total: ".$total;
                 
                 */
                ?>
        
            <table border="1">
                
                <tr>
                    <td align="center"><b>Codigo</b></td>
                    <td align="center"><b>Cantidad</b></td>
                    <td align="center"><b>Descripcion</b></td>
                    <td align="center"><b>Precio</b></td>


                </tr>
                   <tr>
                       <td>codProducto:<?=$cod?></td><td align="center"><?=$_SESSION[factura][$cod]?></td><td><?=$elemento[descripcion]?></td><td>Precio: <?=$elemento[precio_venta]?> €</td><br>

                   </tr>

                <?php
                  }
                }
                if($total<=50){
                        
                        $subtotal= ($total*5)/100;
                        $subtotal=  $total-$subtotal;
                        $iva=($subtotal*21)/100;
                        $totalIva=$subtotal+$iva;
                        
                        
                    }else{
                        $subtotal=$total;
                        $iva=($total*21)/100;
                        $totalIva=$total+$iva;
                    }
                    ?>
                </table>
                <table border="1"> 
                        <tr>
                            <?php
                                if($total<=50){
                                    echo"<tr><td>||| Efectuado descuento del 5% |||</td></tr>";
                                }
                            ?>
                            <td colspan="3" align="right">
                               <b>SUBTOTAL:      .......................................................</b> 
                            </td>

                            <td align="right" >
                                <b><?=$subtotal?> €</b>  
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="right">
                               <b>I.V.A:         .......................................................</b> 
                            </td>

                            <td align="right" >
                                <b>  21%</b>  
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="right">
                               <b>TOTAL:         ......................................................... </b>
                            </td>
                             <td align="right">
                                <b> <?=round($totalIva, 2)?> €</b>  
                            </td>
                        </tr>
                </table>
            <br><br><br> 
            <table border="1">
                <tr>
                    <td>
                        <form action="index.php" method="post">              
                                  <input type="hidden" name="cod" value="<?=$cod?>">
                                  <input type="hidden" name="accion" value="terminarCompraImprimida">
                                  <input type="submit" value="Hecho">
                        </form>
                    </td>

                </tr>

            ?>
            </table>
        </div>
    </body>
</html>
