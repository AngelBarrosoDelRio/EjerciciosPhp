
<?php

include_once 'Animal.php';

class Mamifero extends Animal {

    public function __construct($sexo) {

        parent::__construct($sexo);
    }

    public function mama() {
        if ($this->getSexo() == "macho") {
            return "Soy macho, no puedo amamantar :(";
        } else {
            return "Toma pecho, hazte grande";
        }
    }

}
?>
    
