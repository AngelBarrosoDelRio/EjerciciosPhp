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
        <?php
        if($_POST['accion']=="alta"){
            $_SESSION['diccionario'][$_POST['espanol']]=$_POST['ingles'];
        }
        if($_POST['accion']=="modificacion"){
            $_SESSION['diccionario'][$_POST['espanol']]=$_POST['ingles'];
        }
        if($_POST['accion']=="eliminar"){
            unset($_SESSION['diccionario'][$_POST['espanol']]);
            setcookie($_POST['espanol'], NULL, -1);
        }
        
        echo "<table>"; 
        foreach ($_SESSION['diccionario'] as $espanol => $ingles) {
        ?>
        <tr><td><?=$espanol?></td><td><?=$ingles?></td><td>
            <form action="administracionPalabras.php" method="post">
              <input type="hidden" name="espanol" value="<?=$espanol?>">
              <input type="submit" name="accion" value="eliminar">
            </form>
            </td><td>
                <form action="modificarPalabra.php" method="post">
              <input type="hidden" name="espanol" value="<?=$espanol?>">
              <input type="submit" value="modificacion">
            </form>
            </td></tr>
        <?php    
        }
        ?>
        </table>

        <hr><table><tr>
        
        <td>
        <form action="altaPalabra.php" method="post">
          <input type="submit" value="Añadir nueva&#x00A;palabra">
        </form>
        </td>
        
        <td>
        <form action="administracionCookies.php" method="post">
          <input type="hidden" name="accion" value="borrarCookies">
          <input type="submit" value="Borrar todo los cambios">
        </form>
        </td>
        <td>
            <form action="administracionCookies.php" method="post">          
          <input type="hidden" name="accion" value="actualizarCookies">
          <input type="submit" value="Guardar cambios">
        </form>
        </td>

        </tr></table>
    </body>
</html>
