<?php

require_once '../View/listadoArticulo.php';
$ofertaAux = $_GET['cerrarsesion'];
session_destroy();
header("Location: indexArray.php");
