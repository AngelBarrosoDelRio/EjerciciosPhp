<?php

include_once 'Mamifero.php';

class Perro extends Mamifero {

    private $raza;

    public function __construct($sexo, $raza) {

        parent::__construct($sexo, $raza);
        if (!isset($raza)) {
            $this->raza = "yorkshire";
        } else {
            $this->raza = $raza;
        }
    }

    public function getRaza() {

        return $this->raza;
    }

    // metodos
    public function sientate() {
        return "Ya estoy sentado.";
    }

    public function dameLaPatita() {
        return "Toma mi patita.";
    }

    public function ladra() {
        return "guaff guaff.";
    }

}

?>
