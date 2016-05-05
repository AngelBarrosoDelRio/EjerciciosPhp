
<?php

require_once '../Model/Articulo.php';
require_once '../Model/Usuario.php';

$id = $_POST['nombre'];
// Obtiene todas los articulos
$data['articulo'] = Articulo::getArticulo();
$acceso['arrayusuario'] = Usuario::getUsuarios();


/* var_dump($acceso);
  foreach($acceso['arrayusuario'] as $usuarioComprueba)  {
  echo "codigo:".$usuarioComprueba->getCodigoUsuario()."<br>";
  echo "nombre:".$usuarioComprueba->getNomUsuario()."<br>";
  echo "apellido:".$usuarioComprueba->getApellUsuario()."<br>";
  echo "nombre acceso:".$usuarioComprueba->getNomAcceso()."<br>";
  echo "contraseña:".$usuarioComprueba->getContraseñaUsuario()."<br>";
  echo "mail:".$usuarioComprueba->getMailUsuario()."<br>";

  }
 */
// Carga la vista de listado
include '../View/listadoArticulo.php';
