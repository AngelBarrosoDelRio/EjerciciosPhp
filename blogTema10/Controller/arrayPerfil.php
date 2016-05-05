<?php

require_once '../Model/Usuario.php';

$id = $_POST['nombre'];
$acceso['arrayusuario'] = Usuario::getUsuarios();

include '../View/listadoPerfil.php';
