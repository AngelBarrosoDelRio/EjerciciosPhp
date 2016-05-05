<?php

include_once 'Reptil.php';

class Serpiente extends Reptil {

    private $raza;

    public function __construct($sexo, $raza) {

        parent::__construct($sexo);
        if (!isset($raza)) {
            $this->raza = "cobra";
        } else {
            $this->raza = $raza;
        }
    }

    public function getRaza() {

        return $this->raza;
    }

    // metodos
    public function seEsconde() {
        return '<img src="/Ejercicio2/res/imagenes/lagartoEscondido.jpg "width="100" heigtn="100" border="1">'; //"lagartoEscondido.jpg";
    }

}

?>