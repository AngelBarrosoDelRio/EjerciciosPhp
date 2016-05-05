<?php

require_once '../Model/Comentario.php';



// inserta el comentario en la base de datos
$ofertaAux = new Comentario("", $_POST['fecha'], $_POST['comentario'], $_POST['codigoArticuCome'], $_POST['usuarioactivo']);
$ofertaAux->insert();
header("Location: indexArray.php");
