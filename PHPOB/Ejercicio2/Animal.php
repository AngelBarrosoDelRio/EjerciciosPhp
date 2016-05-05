    
<?php

class Animal {

    private $sexo;

    public function __construct($sexo) {
        // darle un sexo en caso d que no se indique ninguno
        $this->sexo = $sexo;
        if (!isset($sexo)) {
            $this->sexo = "hembra";
        } else {
            $this->sexo = $sexo;
        }
    }

    public function getSexo() {

        return $this->sexo;
    }

    public function come($comida) {
        return "Estoy comiendo " . $comida;
    }

    public function duerme() {
        return "zzzzzzzzzz";
    }

    public function __toString() {
        return "Sexo: $this->sexo";
    }

    public function asea() {
        return "Me estoy limpiando que estoy muy cochino!!";
    }

}
?>
    
