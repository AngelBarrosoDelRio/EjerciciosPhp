<!DOCTYPE html>
<!--
Crea el programa GESTISIMAL (GESTIón SIMplifcada de Almacén) para llevar el control de los
artículos de un almacén. De cada artículo se debe saber el código, la descripción, el precio de
compra, el precio de venta y el stock (número de unidades). La entrada y salida de mercancía
supone respectivamente el incremento y decremento de stock de un determinado artículo. Hay que
controlar que no se pueda sacar más mercancía de la que hay en el almacén. El programa debe tener,
al menos, las siguientes funcionalidades: listado, alta, baja, modificación, entrada de mercancía y
salida de mercancía.
-->
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
        
        //$consulta = $conexion->query("SELECT cod, descripcion, precio_compra, precio_venta, stock FROM articulos");
        
        // SALIDA DE PRODUCTOS DEL STOCK EXISTENTE
        if($_POST['accion'] == "salida") {
            $codigo=$_POST['cod'];
        
            //echo "codigo: ".$codigo;
        
            while ($articulo = $consulta->fetchObject()) {
                //echo"cod".$articulo->cod."<br>";
                //echo"stock antes: ".$articulo->stock."<br>";
                if(($codigo==$articulo->cod)&&($articulo->stock>=0)){
                    $articulo->stock--;
                    $prueba=$articulo->stock;
                    //echo"stock despues: ".$prueba."<br>";
                }
                
            }
            $modifica = $conexion->exec("UPDATE articulos SET  stock=\"$prueba\" WHERE cod=\"$codigo\"");
            //echo "UPDATE articulos SET  stock=\"$prueba\" WHERE cod=\"$codigo\"";
        }
        // INTRODUCIR ARTICULOS EN EL STOCK
        if($_POST['accion'] == "entrada") {
            $codigo=$_POST['cod'];
        
            //echo "codigo: ".$codigo;
        
            while ($articulo = $consulta->fetchObject()) {
                //echo"cod".$articulo->cod."<br>";
                //echo"stock antes: ".$articulo->stock."<br>";
                if($codigo==$articulo->cod){
                    $articulo->stock++;
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
        
        if($_POST['accion'] == "confirmar") {
     
          $modifica = $conexion->exec("UPDATE articulos SET  descripcion=\"$_POST[descripcion]\", precio_compra=\"$_POST[precioCompra]\",precio_venta=\"$_POST[precioVenta]\", stock=\"$_POST[stock]\" WHERE cod=\"$_POST[cod]\"");
            
        }
        if($_POST['accion'] == "alta") {
            
            $inserta = $conexion->exec("INSERT INTO articulos VALUES (\"$_POST[cod]\", \"$_POST[descripcion]\", \"$_POST[precioCompra]\", \"$_POST[precioVenta]\", \"$_POST[stock]\")");
        }
        
        $consulta = $conexion->query("SELECT cod, descripcion, precio_compra, precio_venta, stock FROM articulos");
        
        ?>
       
        <table border="1">
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
                    
                    <input type="hidden" name="cod" value="<?=$articulo->cod?>">  
                    <input type="hidden" name="descripcion" value="<?=$articulo->descripcion?>">
                    <input type="hidden" name="precioCompra" value="<?=$articulo->precio_compra?>">
                    <input type="hidden" name="precioVenta" value="<?=$articulo->precio_venta?>">
                    <input type="hidden" name="stock" value="<?=$articulo->stock?>">
                    <input type="hidden" name="accion" value="modificar">
                    <input type="submit" value="modificar">
                </form>
                </td> 
                <td>
                <form action="index.php" method="post">
                    
                    <input type="hidden" name="cod" value="<?=$articulo->cod?>">
                    <input type="hidden" name="accion" value="salida">
                    <input type="submit" value="Salida stock">
                </form>
                </td> 
                <td>
                <form action="index.php" method="post">
                    
                    <input type="hidden" name="cod" value="<?=$articulo->cod?>">
                    <input type="hidden" name="accion" value="entrada">
                    <input type="submit" value="Entrada stock">
                </form>
                </td> 
                
          </tr>
        <?php
        }
        ?>
        </table>
        <table border="1">
            <tr>
            <h2>Alta nuevo Producto</h2>
            </tr>
            <td><b>Cod</b></td>
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
                <td><input type="submit" value="Alta nuevo producto"><br>
            </form><br>
        </table>
        <?php
        if($_POST['accion'] == "modificar") {
            $cod = $_POST['cod'];
            $descripcion = $_POST['descripcion'];
            $precioCompra = $_POST['precioCompra'];
            $precioVenta = $_POST['precioVenta'];
            $stock = $_POST['stock'];
            
        ?>
        <h3>Modifica los datos que desees:</h3><br>
            <form action="index.php" method="post">
                <input type="number" name="cod" value="<?=$cod?>">  
                <input type="text" name="descripcion" value="<?=$descripcion?>">
                <input type="number" name="precioCompra" value="<?=$precioCompra?>">
                <input type="number" name="precioVenta" value="<?=$precioVenta?>">
                <input type="number" name="stock" value="<?=$stock?>">
                <input type="hidden" name="accion" value="confirmar">
                <input type="submit" value="Confirmar">
            </form>
        <?php   
        }
        ?>
    </body>
</html>
