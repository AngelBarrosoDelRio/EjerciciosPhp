<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="/View/cssPrincipal/cssArticulosBlock.css"> 
        <title></title>
    </head>
    <body>
        <form action="../Controller/anadirUsuarioAbd.php"  method="POST">
            <h3>nombre</h3>
            <input type="text" size="40" name="nombre">
            <h3>apellido</h3>
            <input type="text"  name="apellido">
            <br><h3>nombre acceso</h3>
            <input type="text" size="40" name="nomAccesoUs">
            <h3>contraseña</h3>
            <input type="password" size="40" name="contra">
            <h3>mail</h3>
            <input type="text" size="40" name="mail">
            <input type="submit" value="Alta nueva">
        </form>
    </body>
</html>
