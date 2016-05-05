<?php

require_once '../Model/Comentario.php';
require_once '../Model/Articulo.php';
require_once '../Model/Usuario.php';


if(isset($_POST['id'])){
   $codigoArticuloComent = $_POST['id'];
   // Obtiene todas los articulos
$data['articulo'] = Articulo::getArticuloElegido($codigoArticuloComent);

// Obtiene todas los comentarios pertencientes a un articulo en concreto.

$dataComent['comentario'] = Comentario::getComentarios($codigoArticuloComent);

// Obtiene todas los usuarios pertencientes a un articulo en concreto.
$acceso['arrayusuario'] = Usuario::getUsuarios();
}else{
    $codigoArticuloComent=$_GET['id'];
    // Obtiene todas los articulos
$data['articulo'] = Articulo::getArticuloElegido($codigoArticuloComent);

// Obtiene todas los comentarios pertencientes a un articulo en concreto.

$dataComent['comentario'] = Comentario::getComentarios($codigoArticuloComent);

// Obtiene todas los usuarios pertencientes a un articulo en concreto.
$acceso['arrayusuario'] = Usuario::getUsuarios();

}



// Carga la vista de listado

include '../View/listadoComent.php';
