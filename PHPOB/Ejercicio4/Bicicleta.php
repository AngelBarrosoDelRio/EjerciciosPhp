<?php

include_once 'Vehiculo.php';

class Bicicleta extends Vehiculo {

    // atributos
    private $modelo;
    private $marca;

    // constructor
    public function __construct($ma, $mo) {
        parent::__construct();
        $this->marca = $ma;
        $this->modelo = $mo;
    }

    // metodo
    public function hazCaballito() {
        return "Miraaaa que caballito me estoy haciendoo!!!!!";
    }

}
