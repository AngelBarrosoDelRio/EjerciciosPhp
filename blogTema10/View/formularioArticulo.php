<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="/View/cssPrincipal/cssArticulosBlock.css"> 
        <title></title>
    </head>
    <body>
        <form action="../Controller/anadirArticuloAbd.php"  method="POST">
            <h3>Título</h3>
            <input type="text" size="40" name="titulo">
            <h3>fecha</h3>
            <input type="date"  name="fecha">
            <br><h3>contenido</h3>
            <textarea name="contenido" cols="60" rows="6">
            </textarea><hr>
            <input type="submit" value="Aceptar">
        </form>
    </body>
</html>
