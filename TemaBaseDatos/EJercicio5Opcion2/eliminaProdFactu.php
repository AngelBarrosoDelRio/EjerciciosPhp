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
        $codigo=$_POST['cod'];
        $cantidad=$_POST['cantidadAsumar'];
        $accion = $_POST['accion'];
        
        ?>
        <table border="1">
            <h3>CONFIRMAR ELIMINACION ARTICULO DE LA FACTURA</h3>
            
            <tr>    
                <td>
                    <form action="index.php" method="post">
                        <tr><td> ¿Seguro que desea suprimir este articulo y cantidad de la factura?<td></tr>
                        <tr><td>Codigo: <input type="number" name="cod" value="<?=$codigo?>" readonly><td></tr>
                        <tr><td>Cantidad: <input type="number" name="cantidad" value="<?=$cantidad?>" readonly><td></tr>
                        <input type="hidden" name="accion" value="eliminarProdu">
                        <tr><td><input type="submit" value="Confirmar Eliminacion"><td></tr>
                    </form>
                </td>
            </tr>
        </table>
        
        
    </body>
</html>
