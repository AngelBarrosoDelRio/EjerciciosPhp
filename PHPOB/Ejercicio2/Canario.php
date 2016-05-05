<?php

include_once 'Ave.php';

class Canario extends Ave {

    private $color;

    public function __construct($sexo) {

        parent::__construct($sexo);
    }

    public function getColor($colorRec) {

        return $this->color = $colorReci;
    }

    // metodos
    public function canta() {
        return "pio pio pio.";
    }

    public function seLava() {
        return "Me estoy limpiando las plumas.";
    }

}

?>
