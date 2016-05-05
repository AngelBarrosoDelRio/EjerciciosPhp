<?php

include_once 'Animal.php';

class Reptil extends Animal {

    public function __construct($sexo) {

        parent::__construct($sexo);
    }

    public function tomaSol() {
        return "soy de sangre fria asi que debo tomar el sol.";
    }

}

?>
