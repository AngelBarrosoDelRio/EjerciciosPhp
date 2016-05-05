<?php

require_once '../Model/Comentario.php';
$ofertaAux = new Comentario($_POST['codigoComent']);
$ofertaAux->delete();
header("Location: indexArray.php");
