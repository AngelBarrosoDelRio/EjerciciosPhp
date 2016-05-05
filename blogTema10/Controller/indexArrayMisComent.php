<?php

require_once '../Model/Comentario.php';
require_once '../Model/Usuario.php';


$codigoArticuloComent = $_POST['id'];



// Obtiene todas los comentarios pertencientes a un articulo en concreto.

$dataComent['comentario'] = Comentario::getComentarios($codigoArticuloComent);

// Obtiene todas los usuarios pertencientes a un articulo en concreto.
$acceso['arrayusuario'] = Usuario::getUsuarios();


// Carga la vista de listado

include '../View/listadoComent.php';
