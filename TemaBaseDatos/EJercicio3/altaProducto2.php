<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="/EJercicio3/res/css/cssTiendaOnline.css">
        <title></title>
    </head>
    <body>
        
        <table border="1">
            <tr>
            <h2>Alta nuevo cliente</h2>
            </tr>
             <td><b>Cod</b></td>
            <td><b>Nombre</b></td>
            <td><b>Precio</b></td>
            <td><b>Imagen</b></td>
            <td><b>Descripcion</b></td>
            </tr>
            <tr>
            <form action="index.php" method="post">
                <td><input type="number" name="cod" ></td>
                <td><input type="text" name="nombre" ></td>
                <td><input type="text" name="precio" ></td>
                <td><input type="text" name="imagen" ></td>
                <td><input type="text" name="descripcion" ></td>
                <td><input type="hidden" name="accion" value="alta">
                <td><input type="submit" value="Alta nuevo cliente"><br>
            </form><br>
        </table>
        
    </body>
</html>
