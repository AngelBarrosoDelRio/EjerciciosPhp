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
        <link type="text/css" rel="stylesheet" href="/EJercicio5Opcion2/res/cssAlmacen.css"> 
        <title></title>
    </head>
    <body>
        <?php
////////////////////////CONECTIVIDAD BASE DATOS///////////////////////////////
        
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
            //echo "Se ha establecido una conexión con el servidor de bases de datos.<br>";
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            //die ("Error: " . $e->getMessage());
        }
        
        $consulta = $conexion->query("SELECT cod, descripcion, precio_compra, precio_venta, stock FROM articulos");
        $loginConsulta=$conexion->query("SELECT codigo, nombreCliente, nombreUsuario, contraseña FROM cliente");


///////////////// USUARIO//////////////////////////////////////        
        $nombre=$_POST['nombre'];
        $contraseña=$_POST['contraseña'];

        
        if(isset($nombre)&&(isset($contraseña))){
            
            echo "dentro del if ";
            echo"nombre: ".$nombre;
            while ($cliente = $loginConsulta->fetchObject()){
                
                echo "dentro del while";
                if(($nombre==$cliente->nombreUsuario)&&($contraseña==$cliente->contraseña)){
                    $_SESSION['logueado']=1;
                    echo "dentro del if true";
                    echo"nombre BD: ".$cliente->nombreUsuario;
                    //header("Location:/Ejercicio3/index3.php"); // recarga la página
                   //header("Refresh: 0; url=/EJercicio5Opcion2_1/index.php", true, 303);
                } else {
                    echo '<span style="color: red">Contraseña incorrecta. Inténtelo de nuevo.</span><br><br>';
                    header("Refresh: 0; url=/EJercicio5Opcion2_1/index.php", true, 303); // recarga la página
                }
                
            }
            
        }
        
        if(!isset($_SESSION['logueado'])){ //
        // creo esto para que no se pierda la sesion una vez introducido nombre y contraseña
            $_SESSION['logueado']=0;
            $logueado = $_SESSION['logueado'];
            //echo "<h1>logueado if = " . $logueado . "</h1>";
        } else {
            $logueado = $_SESSION['logueado'];
            //echo "<h1>logueado else = " . $logueado . "</h1>";
        }
        
        if(isset($_SESSION['logueado']) && $_SESSION['logueado'] == 0){
        echo "<p>Por favor introduzca su nombre de usuario y contraseña.</p>";
        
        
        ?>
        <form action="index.php" method="post">
              
              <p>Usuario:</p>
              <input type="text" name="nombre" autofocus>
              <p>Contraseña:</p>
              <input type="password" name="contraseña">
              <input type="submit" value="Aceptar">
            </form> 
        <?php
        }
////////////////////////SI el usuario esta LOGEADO////////////////////////////////
        
        if($_SESSION['logueado'] == 1){
            
//////////////////////// UNA VEZ IMPRIMIDA EN PAGINA SE ELIMINA EN EL INDEX LA FACTURA//////////////////////////////////////////////////
        
        if($_POST['accion'] == "terminarCompraImprimida"){
            echo"Eliminada la factura";
            session_destroy();
            header("Refresh: 0; url=/EJercicio5Opcion2_1/index.php", true, 303);
            
        }
        
///////////// INTRODUCIR ARTICULOS EN EL STOCK//////////////////////////
        
        if($_POST['accion'] == "entrada") {
            $codigo=$_POST['cod'];
            $cantidad1=$_POST['cantidad1'];
            
        
            while ($articulo = $consulta->fetchObject()) {
                
                if($codigo==$articulo->cod){
                    $articulo->stock+=$cantidad1;
                    $prueba=$articulo->stock;
                    
                }
                
            }
            $modifica = $conexion->exec("UPDATE articulos SET  stock=\"$prueba\" WHERE cod=\"$codigo\"");
            
        }
        
/////////////////////ELIMINA PRODUCTOS DE LA BASE DE DATOS////////////////////////
       
        if($_POST['accion'] == "eliminar") {
           $codigo=$_POST['cod']; 
           $borra = $conexion->exec("DELETE FROM articulos WHERE cod=\"$codigo\""); 
        }
        
        
////////////////// CONFIRMACION MODIFICACION///////////////////////////////////
        
        if($_POST['accion'] == "confirmar") {
            
            
            do{
                
                if(($articulo->cod==$_POST[cod])){
                    $esta1=true;
                    
                }
                if($articulo->cod!=$_POST[cod]){
                    $esta1=false;
                    
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
        
/////////////////////////////// ALTA NUEVO PRODUCTO//////////////////////////////
       
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

///////////////////////////COMPRAR/////////////////////////////////////////////        
        
        if ($_POST['accion'] == "comprar") {
            
            $codigo = $_POST['cod'];
            
            
          
          $consulta = $conexion->query("SELECT cod, descripcion, precio_compra, precio_venta, stock FROM articulos");
          
          try {
                    
            while (($articulo = $consulta->fetchObject())&&($existe==false)) {
                  if(($codigo==$articulo->cod)&&($articulo->stock==0)){
                      echo "<h3>NO quedan articulos en el almacen del producto '".$codigo."'</h3>";
                      $_SESSION[factura][$codigo] = 0;
                      $existe=true;

                  } else if(($codigo==$articulo->cod)&&($articulo->stock>0)){

                      $cantidad=$_POST['cantidad'];
                      if($cantidad<=$articulo->stock){
                          $articulo->stock-=$cantidad;
                          $existe=true;
                          $prueba=$articulo->stock;

                          // $_SESSION[factura][$codigo]+=$cantidad PARA ALMACENAR LAS CANTIDADES INTRODUCIDAS DE CADA PRODUCTO.
                          // YA QUE $_SESSION [factura][$codigo] ALMACENA LOS PRODUCTOS INTRODUCIDOS DE UN CODIGO CONCRETO.
                          if (!isset($_SESSION[factura][$codigo])) {
                              $_SESSION[factura][$codigo] = 0;
                          }
                          $_SESSION[factura][$codigo]+=$cantidad;
                          $modifica = $conexion->exec("UPDATE articulos SET  stock=\"$prueba\" WHERE cod=\"$codigo\"");
                      }
                  }

                  if($codigo!=$articulo->cod){

                      $existe=false;

                  }
              }
            } catch (PDOException $e) {
                echo "<h1>Error al ejecutar SELECT o UPDATE.</h1>";
                //die ("Error: " . $e->getMessage());
            }
          if($existe== false){
              echo"<h3> ERROR:El codigo no coincide con ningun articulo del almacen, asegurese de introducir un codigo existente.</h3>";
              
              
          }
          
        }
        
/////////////////////////ELIMINA LA SESION DE LA FACTURA Y REFRESCA LA PAGINA//////////////////////7/////////
        if($_POST['accion']=="terminarCompra"){
           
            
            
            session_destroy();
            header("Refresh: 0; url=/EJercicio5Opcion2_1/index.php", true, 303);  
            
        }
        
/////////////////////////ELIMINAR PRODUCTO DE FACTURA///////////////////////////////////
        
        if ($_POST['accion'] == "eliminarProdu") {
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
        
/////////////////////////// CONSULTA/////////////////////////////////////////////////
       
        $consulta = $conexion->query("SELECT cod, descripcion, precio_compra, precio_venta, stock FROM articulos");
        
////////////////////////// MUESTRA LA TABLA CON LOS ARTICULOS DEL ALMACEN//////////////////////////////
        ?>
        <div class="muestraAlmacen">
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
              <td><b>Eliminar</b></td>
              <td><b>Modificar</b></td>
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
                        <input type="submit" class="button" value="Eliminar">
                        
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
                        <input type="submit" class="button1" value="Modificar">
                        
                    </form>
                    </td> 

              </tr>
            <?php
            }
            ?>

            </table>
        </div>
        <div class="altaProducto">
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
        </div>
        <div class="anadirStock">
            <table border="1">
                <h3>AÑADIR STOCK</h3>
                <tr>
                    <td>
                        <form action="index.php" method="post">
                            <tr><td> Añada el stock de un producto existente.<td></tr>
                            <tr><td>Codigo: <input type="number" name="cod" ><td></tr>
                            <tr><td>Cantidad: <input type="number" name="cantidad1" ><td></tr>
                            <input type="hidden" name="accion" value="entrada">
                            <tr><td><input type="submit" value="Stock Nuevo"><td></tr>
                        </form>
                    </td>
                </tr>   
            </table>
        </div>
        <div class="articuloVenta">
            <table border="1">
                <h3>SELECCIONA ARTICULO PARA VENTA</h3>
                <tr>    
                    <td>
                        <form action="compra.php" method="post">
                            <tr><td> ¿Que articulo desea comprar y cantidad?<td></tr>
                            <tr><td>Codigo: <input type="number" name="cod" ><td></tr>
                            <tr><td>Cantidad: <input type="number" name="cantidad" ><td></tr>
                            <input type="hidden" name="accion" value="comprar">
                            <tr><td><input type="submit" value="VENTA"><td></tr>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <?php
        
//////////////////////// TABLA QUE MUESTRA EL ARTICULO QUE VAMOS A MODIFICAR Y LO ENVIA A CONFIRMACION DE MODIFICACION//////////////////////////////
        
        if($_POST['accion'] == "modificar") {
            $cod = $_POST['cod'];
            $descripcion = $_POST['descripcion'];
            $precioCompra = $_POST['precioCompra'];
            $precioVenta = $_POST['precioVenta'];
            $stock = $_POST['stock'];
            
        ?>
        <div class="modifica">
            <table class="modifica2" border="1">
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
                        <td><input type="submit" value="Confirmar Modificacion">
                    </form>
                </tr>
            </table>
        </div>
        <?php   
        }
        

///////////////////////////////////COMIENZA EL CARRITO ///////////////////////////////////////////////////////

        
////////////COMPRUEBO SI ESTA O NO Inicializado el carrito la primera vez///////////////
        
        $accion = $_POST['accion'];
        /*
        if (!isset($_SESSION[factura])) {
            foreach ($_SESSION as $codigo => $value) {
                
                $_SESSION[factura][$codigo] = 0;
            }
        }*/


        
        

//////////// MUESTRA LA FACTURA CUANDO SE INICIA.//////////////////////////////
        
        if(isset($_SESSION[factura])){
        $total = 0;
        ?>
        <div class='factura'>
            <hr><h3>FACTURA</h3><hr>   
            <?php
                $consulta = $conexion->query("SELECT cod, descripcion, precio_compra, precio_venta, stock FROM articulos");

    /////////////////// LO METO EN EL ARRAY PRODUCTO PARA MOSTRAR LOS ARTICULOS EN LA FACTURA//////////////////////////////////////////

                while ($registro = $consulta->fetchObject()) {

                $producto[$registro->cod] = array(
                  "descripcion" => $registro-> descripcion,
                  "precio_compra" => $registro-> precio_compra,
                  "precio_venta" => $registro-> precio_venta,
                  "stock" => $registro-> stock

                );
            }
            $_SESSION['producto'] = $producto;

    ///////////////////////////////////////////////MUESTRA LA FACTURA/////////////////////////////////////////////

            foreach ($producto as $cod => $elemento) {

                  if ($_SESSION[factura][$cod] > 0) {
                    $cantidadComprada=$_SESSION[factura][$cod];

                    $total = $total + ($_SESSION[factura][$cod] * $elemento[precio_venta]);


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
                             <form action="eliminaProdFactu.php" method="post">              
                                <input type="hidden" name="cod" value="<?=$cod?>">
                                <input type="hidden" name="cantidadAsumar" value="<?=$cantidadComprada?>">
                                <input type="hidden" name="accion" value="eliminarProdu">
                                <input type="submit" value="Eliminar de la Factura">
                           </form>
                           </td>
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

                <table border="1">
                    <tr>
                        <td>
                            <form action="facturaResultante.php" method="post">              
                                <input type="hidden" name="cod" value="<?=$cod?>">
                                <input type="hidden" name="accion" value="imprimir">
                                <input type="submit" value="Imprimir Factura">
                            </form>
                        </td>
                        <td>
                            <form action="index.php" method="post">              
                                <input type="hidden" name="cod" value="<?=$cod?>">
                                <input type="hidden" name="accion" value="terminarCompra">
                                <input type="submit" value="Descartar Factura">
                            </form>
                        </td>
                    </tr>
                <?php
                }
        }
                ?>
                </table>
        </div>
        
    </body>
</html>
