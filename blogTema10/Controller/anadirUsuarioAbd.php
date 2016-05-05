<?php

require_once '../Model/Usuario.php';



// inserta la oferta en la base de datos
$ofertaAux = new Usuario("", $_POST['nombre'], $_POST['apellido'], $_POST['nomAccesoUs'], $_POST['contra'], $_POST['mail']);
$ofertaAux->insert();
header("Location: indexArray.php");
