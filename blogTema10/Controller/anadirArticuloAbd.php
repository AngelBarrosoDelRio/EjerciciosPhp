<?php

require_once '../Model/Articulo.php';



// inserta la oferta en la base de datos
$ofertaAux = new Articulo("", $_POST['titulo'], $_POST['fecha'], $_POST['contenido']);
$ofertaAux->insert();
header("Location: indexArray.php");
