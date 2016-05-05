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
        <header>

        </header>
        <div class="barraNavegacion">
        <div id="header">
            
                
            
            <ul class="nav" style="float:right;list-style-type:none;">
                <li style="float:left" ><a href="../Controller/indexArray.php">INICIO</a></li>
                    
                
                <li style="float:left" ><a href="../Controller/arrayPerfil.php">USUARIO</a>
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
        <h3>PERFIL</h3>
        <?php
        // ZONA DE COMPROBACION DE USUARIO PARA OBTENER LOS DATOS DEL USUARIO CONECTADO 
        // EN ESE MOMENTO
        foreach ($acceso['arrayusuario'] as $usuarioComprue) {


            if ($_SESSION['nombre'] == $usuarioComprue->getNomAcceso()) {
                ?>
                <div class="perfil">
                    <p>
                    <div class="datos"><span><strong>Nombre usuario: </strong> <?= $_SESSION['nombre'] ?></span></div>
                    <div class="datos"><span><strong>Apellido: </strong> <?= $usuarioComprue->getApellUsuario() ?></span></div>
                    <div class="datos"><span><strong>mail usuario: </strong> <?= $usuarioComprue->getMailUsuario() ?></span></div>

                </p>

            </div>
            <?php
        }
    }
    ?>
    <footer class="footer">
        <p>Todos los derechos reservados copyright elblogdelprogramador@gmail.com.</p>
    </footer>
</body>
</html>
