<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="/View/cssPrincipal/cssArticulosBlock.css">
        <title>modifica comentario</title>
    </head>
    <body>
        <h1>MODIFICAR COMENTARIO</h1>
        <hr>
        <?php
        $id = $_POST['codigoComent'];
        $fecha = $_POST['fechaComent'];
        $comentario = $_POST['comentario'];
        ?>
        <div class="formularioModifica">
            <form action="../Controller/actualizarComent.php"  method="POST">
                <h3>codigo</h3>
                <input type="number" size="40" name="codigoModifica" value="<?= $id ?>">
                <h3>fecha</h3>
                <input type="date"  name="fechaModificada" value="<?= $fecha ?>" >
                <br><h3>comentario</h3>
                <textarea name="comentarioModificado" cols="60" rows="6" ><?= $comentario ?></textarea>

                <input type="submit" value="Publicar">
            </form>
            <form action="../Controller/indexArrayComent.php" method="post">

                <input type="submit" value="volver a Inicio">
            </form>
        </div>
        <hr>
    </body>
</html>