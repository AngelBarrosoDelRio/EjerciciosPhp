<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <script src="http://use.fonticons.com/eb6be71a.js"></script>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="/View/cssPrincipal/cssArticulosBlock.css"> 
        <link type="text/css" rel="stylesheet" href="/View/cssPrincipal/css/font-awesome.css"> 
        <link type="text/css" rel="stylesheet" href="/View/cssPrincipal/css/font-awesome.min.css"> 
        <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>         
        
        <title>Listado de Articulos del blog</title>
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
            $admision = "admin";
            $_SESSION['accesoRestringido'] = $admision;

            if ($_SESSION['nombre'] == $admision) {
                ?>
                <div class="divnuevoArticulo"><button ><a class="nuevoArticulo" href="../Controller/nuevoArticulo.php">Nuevo Articulo</a></button></div>
                <?php
            }
            ?>

        </header>
        
        <div class="barraNavegacion">
        <div id="header">
            
                
            
            <ul class="nav" style="float:right;list-style-type:none;">
                <li style="float:left" ><a href="../Controller/indexArray.php">INICIO</a></li>
                <li style="float:left" ><a href="">USUARIO</a>
                    <ul>
                        <li><a href="../Controller/arrayPerfil.php">PERFIL</a></li>
                        <li><a href="../Controller/indexArrayMisComent.php">MIS COMENTARIOS</a></li>
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
        <?php
        foreach ($acceso['arrayusuario'] as $usuarioComprue) {


            if ($_SESSION['nombre'] == $usuarioComprue->getNomAcceso()) {
                ?>
                <div class="identidad">
                    <p>
                        <span><strong>nombre usuario: </strong> <?= $_SESSION['nombre'] ?></span>
                        <span><strong>mail usuario: </strong> <?= $usuarioComprue->getMailUsuario() ?></span>

                    </p>

                </div>
                <?php
            }
        }
        $nombre = $_POST['nombre'];
        $contraseña = $_POST['contraseña'];


        if (isset($nombre) && (isset($contraseña))) {

            echo "dentro del if ";
            echo"nombre: " . $nombre . "<br>";
            echo"nombre: " . $contraseña;
            echo"logeado:" . $_SESSION['logueado'];

            foreach ($acceso['arrayusuario'] as $usuarioComprueba) {


                if (($nombre == $usuarioComprueba->getNomAcceso()) && ($contraseña == $usuarioComprueba->getContraseñaUsuario())) {
                    $_SESSION['logueado'] = 1;
                    $_SESSION['nombre'] = $usuarioComprueba->getNomAcceso();
                    $_SESSION['user'] = $usuarioComprueba->getCodigoUsuario();


                    //header("Location:/Ejercicio3/index3.php"); // recarga la página
                    header("Refresh: 0; url=../Controller/indexArray.php", true, 303);
                } else {
                    echo '<span style="color: red">Contraseña incorrecta. Inténtelo de nuevo.</span><br><br>';
                    header("Refresh: 0; url=../Controller/indexArray.php", true, 303); // recarga la página
                }
            }
        }

        if (!isset($_SESSION['logueado'])) { //
            // creo esto para que no se pierda la sesion una vez introducido nombre y contraseña
            $_SESSION['logueado'] = 0;
            $logueado = $_SESSION['logueado'];
            //echo "<h1>logueado if = " . $logueado . "</h1>";
        } else {
            $logueado = $_SESSION['logueado'];
            //echo "<h1>logueado else = " . $logueado . "</h1>";
        }

        if (isset($_SESSION['logueado']) && $_SESSION['logueado'] == 0) {
            ?>
            <div class="accesoPrincipal">

                <div class="acceso">
                    <h4>ACCESO</h4>
                    <p>Por favor introduzca su nombre de usuario y contraseña.</p>
                    <hr>
                    <form action="../Controller/indexArray.php" method="post">

                        <p>Usuario:</p>
                        <input type="text" name="nombre" autofocus>
                        <p>Contraseña:</p>
                        <input type="password" name="contraseña">
                        <input type="submit" value="Aceptar">
                    </form> 
                </div>
                <div class="altaNew">
                    <h4>¿NO ERES USUARIO?</h4><p>Nuevo usuario</p>
                    <hr>
                    <form action="../Controller/nuevoUsuario.php" method="post">
                        <input type="submit" value="Darme de Alta">
                    </form> 

                </div>
            </div>
            <?php
        }
////////////////////////SI el usuario esta LOGEADO////////////////////////////////

        if ($_SESSION['logueado'] == 1) {


            foreach ($data['articulo'] as $articulo) {
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
                    <div class="comRegre">
                        <a href="indexArrayComent.php?id=<?= $articulo->getId() ?>"><i class="icon fa-comment fa-3x"></i></a>
                    </div>

                    <?php
                    if ($_SESSION['nombre'] == $_SESSION['accesoRestringido']) {
                        ?>
                        <div class="formularios">
                            <div class="modifica">
                                <form action="../Controller/modificarArticulo.php" method="post">
                                    <input type="hidden" name="id" value="<?= $articulo->getId() ?>">
                                    <input type="hidden" name="titulo" value="<?= $articulo->getTitulo() ?>">
                                    <input type="hidden" name="fecha" value="<?= $articulo->getFecha() ?>">
                                    <input type="hidden" name="contenido" value="<?= $articulo->getContenido() ?>">

                                    <input type="submit" value="Modificar Articulo">
                                </form>
                            </div>
                            <div class="elimina">
                                <form action="../Controller/borrarArticulo.php" method="post">
                                    <input type="hidden" name="idBorrar" value="<?= $articulo->getId() ?>">

                                    <input type="submit" value="Eliminar Articulo">
                                </form>
                            </div>

                            <div class="clear">

                            </div>
                        </div>
                        <?php
                    }
                    ?>          
                    <div class="cajaMegusta">
                        <div class="megusta">
                            <a href="actualizarMeGusta.php?meGusta=<?= $articulo->getMeGusta() +1 ?>&id=<?= $articulo->getId() ?>"><p><?= $articulo->getMeGusta() ?><i class="icon fa-thumbs-o-up fa-3x"></i></p></a>
                        </div>
                        <div class="nomegusta">    
                            <a href="actualizarNoMeGusta.php?noMeGusta=<?= $articulo->getNoMeGusta() +1 ?>&id=<?= $articulo->getId() ?>"><p><?= $articulo->getNoMeGusta() ?><i class="icon fa-thumbs-o-down fa-3x "></i></p></a>
                        </div>
                    </div>
                </div>

                <?php
            }
        }// cierre del if logueado
        if ($_SESSION['logueado'] == 1) {
            ?>

            <div class="botonArriba">
                <a href="#arriba"><i class="icon fa-arrow-circle-up fa-3x"></i></a>
                <a name="abajo"></a>
            </div>
            <?php
        }
        ?>
        <footer class="footer">
            <p>Todos los derechos reservados copyright elblogdelprogramador@gmail.com.</p>
        </footer>   
    </body>


</html>

