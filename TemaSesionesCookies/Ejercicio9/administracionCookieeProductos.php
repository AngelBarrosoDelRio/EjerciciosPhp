<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
        // Actualizar las cookies
        if ($_POST['accion'] == "actualizarCookies") {
          foreach ($_SESSION['producto'] as $codigo => $elemento) {
            setcookie($codigo, $elemento, time() + 365 * 24 * 3600);
          }
        }
        // Borrado de cookies y variables
        if ($_POST['accion'] == "borrarCookies") {
          foreach ($_SESSION['producto'] as $codigo=> $elemento) {
            setcookie($codigo,$elemento, NULL, -1);
          }
          unset($_SESSION['producto']);
          session_destroy($_SESSION['producto']);
        }
?>
<?php
        //include 'varsProductos.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <p>Ya se han realizado las modificaciones</p>
        <form action="index9.php" method="post">
          
          <input type="submit" name="accion"  value="Volver al principio">
        </form>
    </body>
</html>
