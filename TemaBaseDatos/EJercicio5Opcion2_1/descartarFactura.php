<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $accion = $_POST['accion'];
        
        ?>
        <table border="1">
            <h3>CONFIRMAR ELIMINACION FACTURA</h3>
            <tr>    
                <td>
                    <form action="index.php" method="post">
                        <tr><td> ¿Seguro que desea eliminar la factura generada?<td></tr>
                        <input type="hidden" name="accion" value="terminarCompra">
                        <tr><td><input type="submit" value="Aceptar"><td></tr>
                    </form>
               
               
                    <form action="index.php" method="post">
                       
                        <input type="hidden" name="accion" value="inicio">
                        <tr><td><input type="submit" value="Cancelar"><td></tr>
                    </form>
                </td>
            </tr>
        </table>
    </body>
</html>
