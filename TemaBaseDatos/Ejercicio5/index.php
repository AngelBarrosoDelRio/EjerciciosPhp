<!DOCTYPE html>
<!--
Modifica el programa anterior añadiendo las siguientes mejoras:
• Comprueba la existencia del código en el alta, la baja y la modificación de artículos para
evitar errores.
• Cambia la opción “Salida de stock” por “Venta”. Esta nueva opción permitirá hacer una venta
de varios artículos y emitir la factura correspondiente. Se debe preguntar por los códigos y
las cantidades de cada artículo que se quiere comprar. Aplica un 21% de IVA.
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
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
            //echo "Se ha establecido una conexión con el servidor de bases de datos.<br>";
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: " . $e->getMessage());
        }
        
        $consulta = $conexion->query("SELECT cod, descripcion, precio_compra, precio_venta, stock FROM articulos");
        
/* SALIDA DE PRODUCTOS DEL STOCK EXISTENTE
        if($_POST['accion'] == "salida") {
            $codigo=$_POST['cod'];
        
            //echo "codigo: ".$codigo;
        
            while ($articulo = $consulta->fetchObject()) {
                //echo"cod".$articulo->cod."<br>";
                //echo"stock antes: ".$articulo->stock."<br>";
                if(($codigo==$articulo->cod)&&($articulo->stock>0)){
                    $articulo->stock--;
                    $prueba=$articulo->stock;
                    //echo"stock despues: ".$prueba."<br>";
                }
                
            }
            $modifica = $conexion->exec("UPDATE articulos SET  stock=\"$prueba\" WHERE cod=\"$codigo\"");
            //echo "UPDATE articulos SET  stock=\"$prueba\" WHERE cod=\"$codigo\"";
        }
    */   
        
// INTRODUCIR ARTICULOS EN EL STOCK
        if($_POST['accion'] == "entrada") {
            $codigo=$_POST['cod'];
            $cantidad1=$_POST['cantidad1'];
            //echo "codigo: ".$codigo;
        
            while ($articulo = $consulta->fetchObject()) {
                //echo"cod".$articulo->cod."<br>";
                //echo"stock antes: ".$articulo->stock."<br>";
                if($codigo==$articulo->cod){
                    $articulo->stock+=$cantidad1;
                    $prueba=$articulo->stock;
                    //echo"stock despues: ".$prueba."<br>";
                }
                
            }
            $modifica = $conexion->exec("UPDATE articulos SET  stock=\"$prueba\" WHERE cod=\"$codigo\"");
            //echo "UPDATE articulos SET  stock=\"$prueba\" WHERE cod=\"$codigo\"";
        }
        
//ELIMINA PRODUCTOS DE LA BASE DE DATOS
        if($_POST['accion'] == "eliminar") {
           $codigo=$_POST['cod']; 
           $borra = $conexion->exec("DELETE FROM articulos WHERE cod=\"$codigo\""); 
        }
        
        
// CONFIRMACION MODIFICACION
        if($_POST['accion'] == "confirmar") {
            //echo "estas dentro de confirmar";
            
            do{
                /*echo "estas dentro del while <br>";
                echo "codigo pasado: ".$_POST[cod]."<br>";
                echo "codigo bbdd: ".$articulo->cod."<br>";
                 
                */
                if(($articulo->cod==$_POST[cod])){
                    $esta1=true;
                    //echo "esta1= true ";
                }
                if($articulo->cod!=$_POST[cod]){
                    $esta1=false;
                    //echo "esta2=false ";
                }
            }while (($articulo = $consulta->fetchObject())&&($esta1==false) );
            
            if($esta1==true){
                
                $modifica = $conexion->exec("UPDATE articulos SET  descripcion=\"$_POST[descripcion]\", precio_compra=\"$_POST[precioCompra]\",precio_venta=\"$_POST[precioVenta]\", stock=\"$_POST[stock]\" WHERE cod=\"$_POST[cod]\"");            
                
            }
            if($esta1==false){
                
                echo"<h4>Error, esta intentando modificar un producto"
                . " con un codigo  inexistente, matenga el codigo anterior "
                . "o eliga un codigo diferente a los que le muestro a continuacion<h4>";
                
                while ($articulo = $consulta->fetchObject()){
                    
                    echo "[ ".$articulo->cod." ]; ";
                }
            }
          
            
        }
        
// ALTA NUEVO PRODUCTO
        if($_POST['accion'] == "alta") {
            
            do{
                if($articulo->cod==$_POST[cod]){
                    $esta=true;
                }
               if($articulo->cod!=$_POST[cod]){
                    $esta=false;
                }
            }while (($articulo = $consulta->fetchObject())&&($esta=false) );
            if($esta==false){
                
                $inserta = $conexion->exec("INSERT INTO articulos VALUES (\"$_POST[cod]\", \"$_POST[descripcion]\", \"$_POST[precioCompra]\", \"$_POST[precioVenta]\", \"$_POST[stock]\")");
            
                
            }
            if($esta==true){
                
                echo"<h4>Error, esta intentando introducir un nuevo producto con un codigo ya existente, vuelva a intentarlo<h4>";
            }
            
        }
        
        // CONSULTA
        $consulta = $conexion->query("SELECT cod, descripcion, precio_compra, precio_venta, stock FROM articulos");
        
        
        // MUESTRA LA TABLA CON LOS ARTICULOS DEL ALMACEN
        ?>
        <table border="1">
        <tr>
            <h3>ALMACEN</h3>
        </tr>
        <tr>
          <td><b>Cod</b></td>
          <td><b>Descripcion</b></td>
          <td><b>Precio Compra</b></td>
          <td><b>Precio Venta</b></td>
          <td><b>Stock almacen</b></td>
        </tr>
        <?php
        while ($articulo = $consulta->fetchObject()) {
            
        ?>
         
         <tr>
            <td><?= $articulo->cod ?></td>
            <td><?= $articulo->descripcion ?></td>
            <td><?= $articulo->precio_compra ?></td>
            <td><?= $articulo->precio_venta ?></td>
            <td><?= $articulo->stock ?></td>
            <td>  
                <form action="index.php" method="post">
                    
                    <input type="hidden" name="cod" value="<?=$articulo->cod?>">
                    <input type="hidden" name="accion" value="eliminar">
                    <input type="submit" value="Eliminar">
                </form>
                </td>
                <td>
                    <form action="index.php" method="post">
                    
                        <input type="hidden" name="cod" value="<?=$articulo->cod?>" readonly>  
                    <input type="hidden" name="descripcion" value="<?=$articulo->descripcion?>">
                    <input type="hidden" name="precioCompra" value="<?=$articulo->precio_compra?>">
                    <input type="hidden" name="precioVenta" value="<?=$articulo->precio_venta?>">
                    <input type="hidden" name="stock" value="<?=$articulo->stock?>">
                    <input type="hidden" name="accion" value="modificar">
                    <input type="submit" value="modificar">
                </form>
                </td> 
                
          </tr>
        <?php
        }
        ?>
         
        </table>
        <?php
// TABLA QUE MUESTRA EL ARTICULO QUE VAMOS A MODIFICAR Y LO ENVIA A CONFIRMACION DE MODIFICACION
        if($_POST['accion'] == "modificar") {
            $cod = $_POST['cod'];
            $descripcion = $_POST['descripcion'];
            $precioCompra = $_POST['precioCompra'];
            $precioVenta = $_POST['precioVenta'];
            $stock = $_POST['stock'];
            
        ?>
        
        <table border="1">
            <tr>
            <h3>MODIFICAR</h3>
         </tr>
            <tr>
                <td><b>Codigo</b></td>
                <td><b>Descripcion</b></td>
                <td><b>Precio Compra</b></td>
                <td><b>Precio Venta</b></td>
                <td><b>Stock almacen</b></td>
            </tr>
            <tr> 
                <form action="index.php" method="post">
                    <td><input type="number" name="cod" value="<?=$cod?>"readonly></td>  
                    <td><input type="text" name="descripcion" value="<?=$descripcion?>"></td>
                    <td><input type="number" name="precioCompra" value="<?=$precioCompra?>"></td>
                    <td><input type="number" name="precioVenta" value="<?=$precioVenta?>"></td>
                    <td><input type="number" name="stock" value="<?=$stock?>"></td>
                    <input type="hidden" name="accion" value="confirmar">
                    <td><input type="submit" value="Confirmar">
                </form>
            </tr>
        <?php   
        }
        ?>
        <table border="1">
         <tr>
            <h3>ALTA NUEVO ARTICULO</h3>
         </tr>
         <tr>
            <td><b>Codigo</b></td>
            <td><b>Descripcion</b></td>
            <td><b>Precio Compra</b></td>
            <td><b>Precio Venta</b></td>
            <td><b>Stock almacen</b></td>
         </tr>
         <tr>
            <form action="index.php" method="post">
                <td><input type="number" name="cod" ></td>
                <td><input type="text" name="descripcion" ></td>
                <td><input type="number" name="precioCompra" ></td>
                <td><input type="number" name="precioVenta" ></td>
                <td><input type="number" name="stock" ></td>
                <input type="hidden" name="accion" value="alta">
                <tr><td><input type="submit" value="Alta nuevo producto"></td></tr>
            </form>
        </tr>
        </table>
            <table border="1">
            <h3>AÑADIR STOCK</h3>
            <tr>
                <td>
                    <form action="index.php" method="post">
                        <tr><td> Añada el stock de un producto existente.<td></tr>
                        <tr><td>Codigo: <input type="number" name="cod" ><td></tr>
                        <tr><td>Cantidad: <input type="number" name="cantidad1" ><td></tr>
                        <input type="hidden" name="accion" value="entrada">
                        <tr><td><input type="submit" value="STOCK NUEVO"><td></tr>
                    </form>
                </td>
            </tr>   
        </table>
        <table border="1">
            <h3>SELECCIONA ARTICULO PARA VENTA</h3>
            <tr>    
                <td>
                    <form action="index.php" method="post">
                        <tr><td> ¿Que articulo desea comprar y cantidad?<td></tr>
                        <tr><td>Codigo: <input type="number" name="cod" ><td></tr>
                        <tr><td>Cantidad: <input type="number" name="cantidad" ><td></tr>
                        <input type="hidden" name="accion" value="comprar">
                        <tr><td><input type="submit" value="VENTA"><td></tr>
                    </form>
                </td>
            </tr>
        </table>
        
        <?php 
// CARRITO ///////////////////////////////////////////////////////
// COMPRUEBO SI ESTA O NO Inicializado el carrito la primera vez
        $accion = $_POST['accion'];
        if (!isset($_SESSION[factura])) {
            foreach ($_SESSION as $codigo => $value) {
                
                $_SESSION[factura][$codigo] = 0;
            }
        }
//SI ESTA INICIALIZADO POR LA ACCIONES QUE RECIBE
// REALIZAR COMPRA.
        if ($accion == "comprar") {
            //echo"hola";
            $codigo = $_POST['cod'];
            //echo "codigo".$codigo;
            
          
          $consulta = $conexion->query("SELECT cod, descripcion, precio_compra, precio_venta, stock FROM articulos");
          
          while (($articulo = $consulta->fetchObject())&&($existe==false)) {
              
                if(($codigo==$articulo->cod)&&($articulo->stock>0)){
                    //echo "codigo ".$codigo."<br>";
                    //echo "codigo bbdd ".$articulo->cod."<br>";
                    $cantidad=$_POST['cantidad'];
                    if($cantidad<=$articulo->stock){
                        $articulo->stock-=$cantidad;
                        $existe=true;
                        $prueba=$articulo->stock;
                        //echo"stock despues: ".$prueba."<br>";
    // $_SESSION[factura][$codigo]+=$cantidad PARA ALMACENAR LAS CANTIDADES INTRODUCIDAS DE CADA PRODUCTO.
                        $_SESSION[factura][$codigo]+=$cantidad;
                        $modifica = $conexion->exec("UPDATE articulos SET  stock=\"$prueba\" WHERE cod=\"$codigo\"");
                    }
                }
                if(($codigo==$articulo->cod)&&($articulo->stock<=0)){
                    echo "<h3>NO quedan articulos en el almacen del producto '".$codigo."'</h3>";
                    $_SESSION[factura][$codigo] = 0;
                    $existe=true;
                
                }
                if($codigo!=$articulo->cod){
                    //echo "codigo ".$codigo."<br>";
                    //echo "codigo bbdd ".$articulo->cod."<br>";
                    $existe=false;
                
                }
          }
          if($existe== false){
              echo"<h3>El codigo no coincide con ningun articulo de el almacen, asegurese de introducir un codigo existente.</h3>";
              
              
          }
          
        }
//ELIMINAR PRODUCTO DE LA FACTURA
        if ($accion == "eliminarProdu") {
            $codigo = $_POST['cod'];
            //echo "codigo:".$codigo;
            $consulta = $conexion->query("SELECT cod, descripcion, precio_compra, precio_venta, stock FROM articulos");
            while ($articulo = $consulta->fetchObject()) {
                if($codigo==$articulo->cod){
                    $cantidadAñadir=$_POST['cantidadAsumar'];
                   // echo "cantidad:".$cantidadAñadir;
                    //echo "stockAntes:".$articulo->stock;
                    $articulo->stock+=$_SESSION[factura][$codigo];
                    $prueba=$articulo->stock;
                    //echo"stock despues: ".$prueba."<br>";
                }
            }        
          $modifica = $conexion->exec("UPDATE articulos SET  stock=\"$prueba\" WHERE cod=\"$codigo\"");
          $_SESSION[factura][$codigo] = 0;
        }
        
        if($accion=="imprimirFactura"){
           
            
            unset( $_SESSION[factura] );
                
            
        }
// la factura no se inicia hasta que este la sesion factura iniciada.
        if(isset($_SESSION[factura])){
        $total = 0;
        ?>
        <div class='carrito'>
        <hr><h3>FACTURA</h3><hr>   
        <?php
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
                <td align="center"><b>Quitar</b></td>
            
            </tr>
               <tr>
                   <td>codProducto:<?=$cod?></td><td align="center"><?=$_SESSION[factura][$cod]?></td><td><?=$elemento[descripcion]?></td><td>Precio: <?=$elemento[precio_venta]?> €</td><br>
                   <td>
                   <form action="index.php" method="post">              
                     <input type="hidden" name="cod" value="<?=$cod?>">
                     <input type="hidden" name="cantidadAsumar" value="<?=$cantidadComprada?>">
                     <input type="hidden" name="accion" value="eliminarProdu">
                     <input type="submit" value="Eliminar">
                   </form>
                   </td>
               </tr>
       
            <?php
              }
            }
            //echo "total: ".$total;
            $iva=($total*21)/100;
            //echo "iva: ".$iva;
            $totalIva=$total+$iva;
            ?>
            </table>
            <table>    
            <tr >
                <td colspan="3" align="right">
                   <b>I.V.A:         .......................................................</b> 
                </td>
                
                <td align="right" >
                    <b>  21%</b>  
                </td>
            <tr>
                <td colspan="3" align="right" >
                    <b>I.V.A         ......................................................... </b>
                </td>
                <td align="right">
                    <b> <?=$iva?> €</b>  
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right">
                   <b>TOTAL:         ......................................................... </b>
                </td>
                 <td align="right">
                    <b> <?=$totalIva?> €</b>  
                </td>
            </tr>
        
            </table>
            
                <form action="index.php" method="post">              
                  <input type="hidden" name="cod" value="<?=$cod?>">
                  
                  <input type="hidden" name="accion" value="imprimirFactura">
                  <input type="submit" value="Terminar compra">
                </form>
               
        
        <?php
        }
        ?>
        </div>
        
    </body>
</html>
