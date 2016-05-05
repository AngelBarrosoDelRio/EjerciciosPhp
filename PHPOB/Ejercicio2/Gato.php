<?php

include_once 'Mamifero.php';

class Gato extends Mamifero {

    private $raza;

    public function __construct($sexo, $raza) {

        parent::__construct($sexo, $raza);
        if (!isset($raza)) {
            $this->raza = "siames";
        } else {
            $this->raza = $raza;
        }
    }

    public function getRaza() {

        return $this->raza;
    }

    // metodos
    public function come($comidaGato) {
        if ($comidaGato == "sardinas") {
            return "Me encata las sardinas";
        } else {
            return "que ascooo no me gusta " . $comidaGato;
        }
    }

    public function araña() {
        return "Zas toma arañazo!!.";
    }

    public function ronrronea() {
        return "grrrrrrr grrrrr";
    }

}

?>
