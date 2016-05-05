        
<?php

class DadoPoker {

    private static $tiradasTotales;
    private $figura;

    //constructor
    public function __construct() {
        
    }

    public function tirada() {

        switch (rand(1, 6)) {
            case 1:

                $this->figura = "AS";

                break;
            case 2:

                $this->figura = "K";

                break;
            case 3:

                $this->figura = "Q";

                break;
            case 4:

                $this->figura = "J";

                break;
            case 5:

                $this->figura = "8";

                break;
            case 6:

                $this->figura = "7";

                break;
            default:
                break;
        }


        DadoPoker::$tiradasTotales++;
    }

    public function getFiguraObtenida() {
        return $this->figura;
    }

    public static function getTiradasTotales() {
        return DadoPoker::$tiradasTotales;
    }

    public function setTiradasTotales($numTiradas) {
        DadoPoker::$tiradasTotales = $numTiradas;
    }

}
?>
    
