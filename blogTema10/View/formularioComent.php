<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="/View/cssPrincipal/cssArticulosBlock.css"> 
        <title></title>
    </head>
    <body>
        <?php
        $codigoArticuloComent = $_POST['codigoArticuCome'];
        $usuarioActivo = $_POST['usuarioactivo'];
        ?>
        <form action="../Controller/anadirComentAbd.php"  method="POST">
            <h3>fecha</h3>
            <input type="date"  name="fecha">
            <br><h3>Comentario</h3>
            <textarea name="comentario" cols="60" rows="6">
            </textarea>
            <input type="hidden"  name="codigoArticuCome" value="<?= $codigoArticuloComent ?>">
            <input type="hidden"  name="usuarioactivo" value="<?= $usuarioActivo ?>">
            <hr>
            <input type="submit" value="Subir">
        </form>
    </body>
</html>