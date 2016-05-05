<?php

require_once '../Model/Articulo.php';



// actualiza el articulo en la base de datos
$ofertaAux = new Articulo($_POST['id'], $_POST['titulo'], $_POST['fecha'], $_POST['contenido']);
$ofertaAux->modifica();
header("Location: indexArray.php");
