<?php

require_once '../Model/Articulo.php';





$ofertaAux = new Articulo($_GET['id']);
$ofertaAux->noMeGusta($_GET['noMeGusta']);

/*$ofertaAux = new Articulo($_GET['meGusta']);
$ofertaAux->actualizaMegusta($_GET['id']);*/
        
    

header("Location: indexArray.php");
