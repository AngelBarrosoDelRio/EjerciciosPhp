


<?php

abstract class Vehiculo {

    // atributo de clase SON estaticos porque estos atributos son generales para toda
    // la clase y objeto , sin embargo kilometraje no, ya que cada vehiculo tendra un
    // kilometraje diferente.
    
    private static $kilometrajeTotal =0;
    private static $vehiculosCreados ;
    
//atributo 
    private $kilometraje;

    //constructor
    public function __construct() {
        $this->kilometraje = 0;
        
    }

    // método de clase
    public static function getVehiculosCreados() {
        return Vehiculo::$vehiculosCreados;
    }

    public static function getkilometrajeTotal() {
        return Vehiculo::$kilometrajeTotal;
    }
    public  static function setkilometrajeTotal($kmTotales) {
        Vehiculo::$kilometrajeTotal += $kmTotales;
    }
    public static function setVehiculosCreados($CochesTotales) {
        Vehiculo::$vehiculosCreados += $CochesTotales;
    }

    //metodo instancia
    public function getKilometraje() {
        return $this->kilometraje;
    }

    public function KmRecorridos($kilometrajeRecibido) {

        $this->kilometraje += $kilometrajeRecibido;
    }

    

}
