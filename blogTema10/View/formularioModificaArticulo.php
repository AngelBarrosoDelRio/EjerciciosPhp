<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="/View/cssPrincipal/cssArticulosBlock.css">
        <title>modifica articulo</title>
    </head>
    <body>
        <h1>MODIFICAR ARTICULO</h1>
        <hr>
        <?php
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $fecha = $_POST['fecha'];
        $contenido = $_POST['contenido'];
        ?>
        <div class="formularioModifica">
            <form action="../Controller/actualizaArticulo.php"  method="POST">
                <h3>codigo</h3>
                <input type="number" size="40" name="id" value="<?= $id ?>">
                <h3>Título</h3>
                <input type="text" size="40" name="titulo" value="<?= $titulo ?>">
                <h3>fecha</h3>
                <input type="date"  name="fecha" value="<?= $fecha ?>" >
                <br><h3>contenido</h3>
                <textarea name="contenido" cols="60" rows="6" ><?= $contenido ?></textarea>

                <input type="submit" value="Publicar">
            </form>
            <form action="../Controller/indexArray.php" method="post">

                <input type="submit" value="volver a Inicio">
            </form>
        </div>
        <hr>
    </body>
</html>