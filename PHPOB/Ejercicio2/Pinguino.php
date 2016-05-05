<?php

include_once 'Ave.php';

class Pinguino extends Ave {

    private $raza;

    public function __construct($sexo, $raza) {

        parent::__construct($sexo);
        if (!isset($raza)) {
            $this->raza = "emperador";
        } else {
            $this->raza = $raza;
        }
    }

    public function getRaza() {

        return $this->raza;
    }

    // metodos
    public function canta() {
        return "pio pio pio.";
    }

    public function seLava() {
        return "Me estoy limpiando las plumas.";
    }

    public function vuela() {
        return "NO puedo volar pero si nadar!!.";
    }

}
?>

