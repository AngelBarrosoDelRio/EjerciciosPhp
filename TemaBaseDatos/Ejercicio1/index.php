<!DOCTYPE html>
<!--
Crea una aplicación web que permita hacer listado, alta, baja y modificación sobre la tabla cliente
de la base de datos banco .
• Para realizar el listado bastará un SELECT, tal y como se ha visto en los ejemplos.
• El alta se realizará mediante un formulario donde se especificarán todos los campos del nuevo
registro. Luego esos datos se enviarán a una página que ejecutará INSERT .
• Para realizar una baja, se pedirá el DNI del cliente mediante un formulario y a continuación
se ejecutará DELETE para borrar el registro cuyo DNI coincida con el introducido.
• La modificación se realiza mediante UPDATE . Se pedirá previamente en un formulario el DNI
del cliente para el que queremos modificar los datos.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            // comprobamos que tengamos conexion con el servidor de la base de datos
            $conexion = mysql_connect("localhost", "root", "root");
            
            if ($conexion) {
             
                echo "Se ha establecido una conexión con el servidor de bases de datos.";
                
            } else {
                
              echo "No se ha podido establecer conexión con el servidor de bases de datos.";
              
            }
            
            // hacemos referencia a la base de datos concreta en la que vamos a trabajar
            mysql_select_db("banco", $conexion);
            mysql_set_charset('utf8');
            
            
            // consulta para sacar la informacion de los clientes almacenados
            $consulta = mysql_query("SELECT dni, nombre, direccion, telefono FROM cliente", $conexion);
            
            // recibe la informacion de los diferente formularios
            if($_POST['accion'] == "alta") {
                    
                    $inserta = "INSERT INTO cliente VALUES (\"$_POST[dni]\", \"$_POST[nombre]\", \"$_POST[direccion]\", \"$_POST[telefono]\")";
                    mysql_query($inserta, $conexion);
                    
            }
            
            if($_POST['accion'] == "modificar") {
                
                $modifica = "UPDATE cliente SET  nombre=\"$_POST[nombre]\", direccion=\"$_POST[direccion]\", telefono=\"$_POST[telefono]\" WHERE dni=\"$_POST[dni]\"";
                mysql_query($modifica, $conexion);
                
            }

            if($_POST['accion'] == "eliminar") {
                
                $borra = "DELETE FROM cliente WHERE dni=\"$_POST[dni]\"";
                mysql_query($borra, $conexion);
            
            }
            
            // A continuacion se muestra todo el contenido de la base de datos
        ?>  
        <div>
            <table border="1">
            <tr>
            <td><b>DNI</b></td>
            <td><b>Nombre</b></td>
            <td><b>Dirección</b></td>
            <td><b>Teléfono</b></td>
            </tr>

        <?php
              while ($registro = mysql_fetch_array($consulta)){// saca datos fila a fila.
        
                echo "<tr>";
                echo "<td>".$registro['dni']."</td>";
                echo "<td>".$registro['nombre']."</td>";
                echo "<td>".$registro['direccion']."</td>";
                echo "<td>".$registro['telefono']."</td>";
                
                ?>      
                <td>  
                <form action="index.php" method="post">
                    
                    <input type="hidden" name="dni" value="<?=$registro['dni']?>">
                    <input type="hidden" name="accion" value="eliminar">
                    <input type="submit" value="Eliminar">
                  </form>
                </td>
                <td>
                  <form action="modificarCliente.php" method="post">
                    
                    <input type="hidden" name="dni" value="<?=$registro['dni']?>">  
                    <input type="hidden" name="nombre" value="<?=$registro['nombre']?>">
                    <input type="hidden" name="direccion" value="<?=$registro['direccion']?>">
                    <input type="hidden" name="telefono" value="<?=$registro['telefono']?>">
                    <input type="hidden" name="accion" value="modificar">
                    <input type="submit" value="modificar">
                </form>
                </td>    
        
        <?php 
                echo "</tr>";
              }
        ?>
        </div>
        <div>
            
             
            <table border="1">
            <h2>¿Desea dar de alta a un nuevo cliente?</h2>
            <tr>
            <td><b>DNI</b></td>
            <td><b>Nombre</b></td>
            <td><b>Dirección</b></td>
            <td><b>Teléfono</b></td>
            </tr>
            <tr>
            <form action="index.php" method="post">
                <td><input type="number" name="dni" ></td>
                <td><input type="text" name="nombre" ></td>
                <td><input type="text" name="direccion" ></td>
                <td><input type="number" name="telefono" ></td>
                <td><input type="hidden" name="accion" value="alta">
                <td><input type="submit" value="Alta nuevo cliente"><br>
            </form><br>
        </div>
        
       </table>
    </body>
</html>
