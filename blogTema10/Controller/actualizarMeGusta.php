<?php

require_once '../Model/Articulo.php';





$ofertaAux = new Articulo($_GET['id']);
$ofertaAux->meGusta($_GET['meGusta']);

/*$ofertaAux = new Articulo($_GET['meGusta']);
$ofertaAux->actualizaMegusta($_GET['id']);*/
        
    

header("Location: indexArray.php");
// actualiza el articulo en la base de datos

