<!DOCTYPE html>
<!--
Modifica el programa anterior añadiendo las siguientes mejoras:
• El listado debe aparecer paginado en caso de que haya muchos clientes.
• Al hacer un alta, se debe comprobar que no exista ningún cliente con el DNI introducido en
el formulario.
• La opción de borrado debe pedir confirmación.
• Cuando se realice la modificación de los datos de un cliente, los campos que no se han
cambiado deberán permanecer inalterados en la base de datos.
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
            $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
            echo "Se ha establecido una conexión con el servidor de bases de datos.<br>";
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: " . $e->getMessage());
        }
        
        if(!isset($_SESSION['pagina'])){
            $_SESSION['pagina'] = 1;
        }
        
        
// determina la pagina en la que estas.
        $listadoClientes = "SELECT dni, nombre, direccion, telefono FROM cliente ";
        $consulta = $conexion->query($listadoClientes);
        $numeroClientes=$consulta->rowCount();
        
        
// division de las paginas.
        $numPaginas = floor(abs($numeroClientes - 1) / 5) + 1;
        
        $pagina = $_POST['pagina'];

        if ($pagina == "Primera") {
          $_SESSION['pagina'] = 1;
        }

        if (($pagina == "Anterior") && ($_SESSION['pagina'] > 1)) {
          $_SESSION['pagina']--;
        }

        if (($pagina == "Siguiente") && ($_SESSION['pagina'] < $numPaginas)) {
          $_SESSION['pagina']++;
        }

        if ($pagina == "Ultima") {
          $_SESSION['pagina'] = $numPaginas;
        }
        

// recibe la informacion de los diferente formularios
        
        if($_POST['accion'] == "alta") {

                $inserta = $conexion->query("INSERT INTO cliente VALUES (\"$_POST[dni]\", \"$_POST[nombre]\", \"$_POST[direccion]\", \"$_POST[telefono]\")");
                // comprueba que en ninguna fila este el mismo dni ( si fuese igual a 1 signitifica que hay ya uno ocupado).
                if (mysql_num_rows($consulta) == 1) {
                    echo "<h2>Lo siento, ese DNI ya existe en la base de datos</h2><br>";
                } else {
                    $inserta = $conexion->query("INSERT INTO cliente VALUES (\"$_POST[dni]\", \"$_POST[nombre]\", \"$_POST[direccion]\", \"$_POST[telefono]\")");
                }
        }

        if($_POST['accion'] == "modificar") {

            $modifica = $conexion->query("UPDATE cliente SET  nombre=\"$_POST[nombre]\", direccion=\"$_POST[direccion]\", telefono=\"$_POST[telefono]\" WHERE dni=\"$_POST[dni]\"");
            

        }

        if($_POST['confirmarEliminar'] == "si") {
            $eliminar=$_POST['dni'];
            $borra = $conexion->query("DELETE FROM cliente WHERE dni=\"$eliminar\"");
            echo"<h2>Cliente eliminado con exito</h2><br>";
            
        }
            

            

        //}
        
        ?>
        <table border="1">
        <tr>
          <td><b>DNI</b></td>
          <td><b>Nombre</b></td>
          <td><b>Dirección</b></td>
          <td><b>Teléfono</b></td>
        </tr>

        <?php
        $listadoClientes = "SELECT dni, nombre, direccion, telefono FROM cliente ORDER BY nombre LIMIT ".(($_SESSION['pagina'] - 1) * 5).", 5";
        
        $consulta =$conexion->query($listadoClientes);
        
        while ($cliente = $consulta->fetchObject()) {
        ?>
          <tr>
            <td><?= $cliente->dni ?></td>
            <td><?= $cliente->nombre ?></td>
            <td><?= $cliente->direccion ?></td>
            <td><?= $cliente->telefono ?></td>
            <td>  
                <form action="confirmarEliminacion.php" method="post">
                    
                    <input type="hidden" name="dni" value="<?=$cliente->dni?>">
                    <input type="hidden" name="accion" value="eliminar">
                    <input type="submit" value="Eliminar">
                  </form>
                </td>
                <td>
                  <form action="modificarCliente.php" method="post">
                    
                    <input type="hidden" name="dni" value="<?=$cliente->dni?>">  
                    <input type="hidden" name="nombre" value="<?=$cliente->nombre?>">
                    <input type="hidden" name="direccion" value="<?=$cliente->direccion?>">
                    <input type="hidden" name="telefono" value="<?=$cliente->telefono?>">
                    <input type="hidden" name="accion" value="modificar">
                    <input type="submit" value="modificar">
                </form>
                </td>    
          </tr>
        <?php              
        }
        ?>
        </table>
        <table border="1">
          <!-- Botones para pasar las páginas -->
        <tr><td>Página <?=$_SESSION['pagina']?> de <?=$numPaginas?></td>
        <!-- Primera -->
        <td>
          <form action="index.php" method="post">
            
            <button type="submit" name="pagina" value="Primera">
              <span class="glyphicon glyphicon-step-backward"></span>
              Primera
            </button>
          </form>
        </td>
        <!-- Anterior -->
        <td>
          <form action="index.php" method="post">
            
            <button type="submit" name="pagina" value="Anterior">
              <span class="glyphicon glyphicon-chevron-left"></span>
              Anterior
            </button>
          </form>
        </td>
        <!-- Siguiente -->
        <td>
          <form action="index.php" method="post">
            
            <button type="submit" name="pagina" value="Siguiente">
              Siguiente
              <span class="glyphicon glyphicon-chevron-right"></span>
            </button>
          </form>
        </td>
        <!-- Última -->
        <td>
          <form action="index.php" method="post">
            
            <button type="submit" name="pagina" value="Ultima">
              Última
              <span class="glyphicon glyphicon-step-forward"></span>
            </button>
          </form>
        </td>      
        </table>
        <br>
        <table border="1">
            <tr>
            <h2>Alta nuevo cliente</h2>
            </tr>
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
        </table>
        
    </body>
</html>
