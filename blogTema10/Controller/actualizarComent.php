<?php

require_once '../Model/Comentario.php';



// actualiza el comentario en la base de datos
$ofertaAux = new Comentario($_POST['codigoModifica'], $_POST['fechaModificada'], $_POST['comentarioModificado']);
$ofertaAux->modificar();
header("Location: indexArrayComent.php");
