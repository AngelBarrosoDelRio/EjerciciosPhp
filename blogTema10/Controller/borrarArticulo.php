<?php

require_once '../Model/Articulo.php';
$ofertaAux = new Articulo($_POST['idBorrar']);
$ofertaAux->delete();
header("Location: indexArray.php");
