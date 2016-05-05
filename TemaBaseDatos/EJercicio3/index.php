<!DOCTYPE html>
<!--
Modifica la tienda virtual realizada anteriormente de tal forma que todos los datos de los artículos
se guarden en una base de datos.
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
       try {
            $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "root");
            //echo "Se ha establecido una conexión con el servidor de bases de datos.<br>";
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: " . $e->getMessage());
        }
        
        
        $consulta = $conexion->query("SELECT cod, nombre, precio, imagen, descripcion,stock FROM catalogo");
        $loginConsulta=$conexion->query("SELECT codCliente, nombCliente, nombreAcceso, contraseñaAcceso FROM usuario");
        
        
        $nombre=$_POST['nombre'];
        $contraseña=$_POST['contraseña'];

        
        if(isset($nombre)&&(isset($contraseña))){
            
            echo "dentro del if ";
            echo"nombre: ".$nombre;
            while ($cliente = $loginConsulta->fetchObject()){
                
                echo "dentro del while";
                if(($nombre==$cliente->nombreAcceso)&&($contraseña==$cliente->contraseñaAcceso)){
                    $_SESSION['logueado']=1;
                    echo "dentro del if true";
                    echo"nombre BD: ".$cliente->nombreAcceso;
                    //header("Location:/Ejercicio3/index3.php"); // recarga la página
                   header("Refresh: 0; url=/EJercicio5Opcion2_1/index.php", true, 303);
                } else {
                    echo '<span style="color: red">Contraseña incorrecta. Inténtelo de nuevo.</span><br><br>';
                    header("Refresh: 0; url=/EJercicio3/index.php", true, 303); // recarga la página
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
           
        if($_POST['accion'] == "comprar") {
            $codigo = $_POST['codigo'];
            $stock= $_POST['stockCompra'];

            $stock--;
            
            $modifica = $conexion->query("UPDATE catalogo SET  stock=\" $stock  \" WHERE cod=\"$codigo\"");
            header("Refresh: 0; url=/EJercicio3/index.php", true, 303); // recarga la página
            
        }
        
        if ($_POST['accion'] == "eliminarProdu") {
            
            $codigo = $_POST['codigo'];
            $stockañade= $_POST['stockañade'];
            
            $stockañade+=$_SESSION[carrito][$codigo];
            
            $modifica = $conexion->query("UPDATE catalogo SET  stock=\" $stockañade  \" WHERE cod=\"$codigo\"");
            header("Refresh: 0; url=/EJercicio3/index.php", true, 303); // recarga la página
            
          
        }
        
        if($_POST['accion'] == "alta") {

            $inserta = $conexion->query("INSERT INTO catalogo VALUES (\"$_POST[cod]\", \"$_POST[nombre]\", \"$_POST[precio]\", \"$_POST[imagen]\", \"$_POST[descripcion]\")");
            
        }
        if($_POST['accion'] == "modificar") {
            
            $modifica = $conexion->query("UPDATE catalogo SET  nombre=\"$_POST[nombre]\", precio=\"$_POST[precio]\", imagen=\"$_POST[imagen]\", descripcion=\"$_POST[descripcion]\" WHERE cod=\"$_POST[codigo]\"");
        }
        if($_POST['accion'] == "eliminar") {

            $eliminar=$_POST['codigo'];
            $borra = $conexion->query("DELETE FROM catalogo WHERE cod=\"$eliminar\"");
            echo"<h2>Cliente eliminado con exito</h2><br>";
            
        }
        ?>
        

        <?php
        
// introduzco o vuelco los valores en el array $producto.
        
        while ($registro = $consulta->fetchObject()) {
            //echo $registro->imagen;
            $producto[$registro->cod] = array(
              "nombre" => $registro-> nombre,
              "precio" => $registro-> precio,
              "imagen" => $registro-> imagen,
              "descripcion" => $registro-> descripcion,
              "stock" => $registro-> stock
            );
        }
        $_SESSION['producto'] = $producto;
        
        // ZONA DE ADMINISTRACION
        ?>
        
        
        
        <div class="catalago">
            <table >
                <tr>
                    <td><h3>Productos</h3><hr></td>
                </tr>
                <?php
                //MUESTRO EL CATALOGO        
                foreach ($producto as $codigo => $elemento) {


                  ?>
                <tr>
                  <td>
                    <img src="/EJercicio3/res/img/<?=$elemento[imagen]?>" width="360" border="1"><br>
                  </td>
                  <td>
                    Codigo Producto: <?=$codigo?><br>Nombre: <?=$elemento[nombre]?><br>Precio: <?=$elemento[precio]?> € <br>stock: <?=$elemento[stock]?>
                    <form action="index.php" method="post">            
                      <input type="hidden" name="codigo" value="<?=$codigo?>">
                      <input type="hidden" name="stockCompra" value="<?=$elemento[stock]?>">
                      <input type="hidden" name="accion" value="comprar">
                      <input type="submit" value="Comprar">
                    </form><br>
                    <form action="detalleProducto.php" method="post">            
                      <input type="hidden" name="codigo" value="<?=$codigo?>">
                      <input type="hidden" name="accion" value="detalle">
                      <input type="submit" value="mas detalles">
                    </form><br><br>
                  </td>
                
                <?php
                }// CIERRE foreach.

                ?>
                </tr>
            </table>
        </div>
        
        
        <?php 
// Carrito ///////////////////////////////////////////////////////
        
        $accion = $_POST['accion'];
        $codigo = $_POST['codigo'];

        
// COMPRUEBO SI ESTA O NO Inicializado el carrito la primera vez
        if (!isset($_SESSION[carrito])) {
            foreach ($_SESSION as $codigo => $value) {
                
                $_SESSION[carrito][$codigo] = 0;
            }
        }
//SI ESTA INICIALIZADO POR LA ACCIONES QUE RECIBE
        if ($accion == "comprar") {
            
          $_SESSION[carrito][$codigo]++;
          
        }

        if ($accion == "eliminarProdu") {
          $_SESSION[carrito][$codigo] = 0;
        }

        
// Muestra el contenido del carrito
        $total = 0;
        ?>
        <div class='carrito'>
        <h3>Carrito</h3><hr>   
        <?php
            foreach ($producto as $cod => $elemento) {

              if ($_SESSION[carrito][$cod] > 0) {
                $total = $total + ($_SESSION[carrito][$cod] * $elemento[precio]);
                ?>
                <img src="/EJercicio3/res/img/<?=$elemento[imagen]?>" width="200" border="1"><br>
                <?=$elemento[nombre]?><br>Precio: <?=$elemento[precio]?> €<br>
                Unidades: <?=$_SESSION[carrito][$cod]?>
                <form action="index.php" method="post">              
                  <input type="hidden" name="codigo" value="<?=$cod?>">
                  <input type="hidden" name="stockañade" value="<?=$elemento[stock]?>">
                  <input type="hidden" name="accion" value="eliminarProdu">
                  <input type="submit" value="Eliminar">
                </form><br><br>
                <?php
              }
            }
            ?>
        
        <b>Total: <?=$total?> €</b>
        </div>
        <div class="admin">
            <h2>¿Desea administrar los productos?</h2>
            <form action="administracionProducto2.php" method="post">
                <input type="hidden" name="administracionProducto">
                <input type="submit" value="Administración Productos">
            </form>
        </div>
        
        <?php
        }
        ?>
    </body>
</html>
