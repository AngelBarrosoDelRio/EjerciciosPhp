
<?php

include_once 'Animal.php';

class Ave extends Animal {

    public function __construct($sexo) {

        parent::__construct($sexo);
    }

    public function vuela() {
        return "Me voy volando de aqui.";
    }

    public function poneHuevo() {
        return "ohh!! que dolor de culo, pedazo huevo he sacadooo!!.";
    }

    public function encuba() {
        return "Tengo que mantener el calor para mis pequeñines.";
    }

}

?>
    