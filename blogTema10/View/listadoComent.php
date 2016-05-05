<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="/View/cssPrincipal/cssArticulosBlock.css"> 
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <title></title>
        <style>
            body{
                background-color: gray;
                margin-bottom: 0 ;
                margin-top: 0;
                height: 100%;

            }
        </style>
    </head>

    <body>
        <a name="arriba"></a>  
        <header>

            <?php
            $codigoArticuloComent = $_POST['id'];
            ?>
            <div class="divnuevoArticulo">
                <form action="../Controller/nuevoComent.php" method="post">
                    <input type="hidden" name="codigoArticuCome" value="<?= $codigoArticuloComent ?>">
                    <input type="hidden" name="usuarioactivo" value="<?= $_SESSION['user'] ?>">
                    <input type="submit" value="Añadir comentario">
                </form>
            </div>
            <?php
            ?>

        </header>

        <div class="barraNavegacion">
        <div id="header">
            
                
            
            <ul class="nav" style="float:right;list-style-type:none;">
                <li style="float:left" ><a href="../Controller/indexArray.php">INICIO</a></li>
                <li style="float:left" ><a href="">USUARIO</a>
                    <ul>
                        <li><a href="../Controller/arrayPerfil.php">PERFIL</a></li>
                        <li><a href="">MIS COMENTARIOS</a></li>
                        <li><a href="cerrarSesion.php?cerrarsesion="<?= $_SESSION['logueado'] ?>>CERRAR SESION</a></li>


                    </ul>
                </li>
                <li style="float:left"><a href="">CONTACTO</a>
                    <ul>
                        <li><a href="">¿QUIEN SOY?</a></li>
                        <li><a href="">CORREO</a></li>

                    </ul>
                </li>

            </ul>
        </div>
            </div>
        <h3>COMENTARIOS</h3>
<?php
foreach ($acceso['arrayusuario'] as $usuarioComprue) {


    if ($_SESSION['nombre'] == $usuarioComprue->getNomAcceso()) {
        ?>
                <div class="identidad">
                    <p>
                        <span><strong>nombre usuario: </strong> <?= $_SESSION['nombre'] ?></span>
                        <span><strong>mail usuario: </strong> <?= $usuarioComprue->getMailUsuario() ?></span>
                        <a href="cerrarSesion.php?cerrarsesion="<?= $_SESSION['logueado'] ?>>cerrar sesion</a>
                    </p>

                </div>
        <?php
    }
}
$cuentaComentArticul = 0;
foreach ($data['articulo'] as $articulo) {
    foreach ($dataComent['comentario'] as $coment) {
        if ($articulo->getId == $coment->getArticuloPerteneciente) {
            $cuentaComentArticul++;
        }
    }
    ?>
            <div class="blockArticle">
                <div class="titulosArticulos">
                    <h3><?= $articulo->getTitulo() ?></h3>
                </div>

                <div class="articuloContenido">
                    <p><?= $articulo->getContenido() ?></p><br>
                </div>

                <div class="fechaArticulos">
                    <p><?= $articulo->getFecha() ?></p><br>
                </div>
            </div>
    <?php
}

if ($cuentaComentArticul == 0) {
    ?>
            <h1>¡¡Este articulo no tiene ningun comentario.... se el primero en dar tu opinion!!</h1>
            <div class="seElPrimero">
                <form action="../Controller/nuevoComent.php" method="post">
                    <input type="hidden" name="codigoArticuCome" value="<?= $codigoArticuloComent ?>">
                    <input type="hidden" name="usuarioactivo" value="<?= $_SESSION['user'] ?>">
                    <input type="submit" value="Añadir comentario">
                </form>
            </div>
    <?php
}

foreach ($dataComent['comentario'] as $coment) {
    ?>
            <div class="blockArticleComent">

            <?php
            foreach ($acceso['arrayusuario'] as $usuarioComprue) {
                ?>
                    <div class="titulosComent">
                    <?php
                    if ($coment->getComentPerteneciente() == $usuarioComprue->getCodigoUsuario()) {
                        ?>

                            <h7><?= $usuarioComprue->getNomAcceso() ?></h7>

                            <?php
                        }
                        ?>
                    </div>       
        <?php
    }
    ?>



                <div class="articuloContenido">
                    <p><?= $coment->getComentario() ?></p><br>
                </div>
                <div class="fechaArticulos">
                    <p><?= $coment->getFechaComent() ?></p>
                </div>
    <?php
    if (($_SESSION['user'] == $coment->getComentPerteneciente()) or ( $_SESSION['nombre'] == "admin")) {
        ?>
                    <div class="formulariosCOment">
                        <div class="modifica">
                            <form  action="../Controller/modificarComent.php" method="post">
                                <input type="hidden" name="codigoComent" value="<?= $coment->getCodigoComent() ?>">                        
                                <input type="hidden" name="fechaComent" value="<?= $coment->getFechaComent() ?>">
                                <input type="hidden" name="comentario" value="<?= $coment->getComentario() ?>">

                                <input class="imput" type="submit" value="Modificar Comentario">
                            </form>
                        </div>
                        <div class="elimina">
                            <form action="../Controller/borrarComent.php" method="post">
                                <input type="hidden" name="codigoComent" value="<?= $coment->getCodigoComent() ?>">

                                <input type="submit" value="Eliminar Comentario">
                            </form>
                        </div>
        <?php
    }
    ?>

                    <div class="clear"></div>
                </div>
            </div>
    <?php
}
?>


        <div class="comRegre2">
            <a href="../Controller/indexArray.php"><button class="botonRegresar">Volver a inicio</button></a>



        </div>
        <div class="botonArriba">
            <a href="#arriba"><i class="fa fa-arrow-circle-up fa-3x"></i></a>
            <a name="abajo"></a>
        </div>



        <footer class="footer">
            <p>Todos los derechos reservados copyright elblogdelprogramador@gmail.com.</p>
        </footer>
    </body>

</html>
