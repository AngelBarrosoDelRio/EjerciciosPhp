<?php

class Zona {

    ///ATRIBUTOS DE CLASE
    private static $zonaPrincipal;
    private static $zonaCompraVenta;
    private static $zonaVips;

    //// CONSTRUCTOR        
    public function __construct() {
        
    }

    /// METODOS getter AND setter
    
    //devuelve la cantidad de entradas que kedan disponibles
    public static function getzonaPrincipal() {
        return Zona::$zonaPrincipal;
    }

    public static function getzonaCompraVenta() {
        return Zona::$zonaCompraVenta;
    }

    public static function getzonaVips() {
        return Zona::$zonaVips;
    }

    //recibe la cantidad de entradas que tiene cada seccion en la session
    //cada vez que se recarga la pagina asi se actualiza
    public function setzonaprincipal($entradasPrincipal) {
        Zona::$zonaPrincipal = $entradasPrincipal;
        return "estoy dentro del set";
    }

    public function setzonacompraventa($entradascompra) {
        Zona::$zonaCompraVenta = $entradascompra;
    }

    public function setzonavip($entradasvip) {
        Zona::$zonaVips = $entradasvip;
    }

    // trata la cantidad a reducir del stock de las entradas cada vez que 
    // se realiza una compra
    public function setvendePrin($entradasPri) {
        Zona::$zonaPrincipal -= $entradasPri;
        return "estoy dentro del set";
    }

    public function setvendeCom($entradasPri) {
        Zona::$zonaCompraVenta -= $entradasPri;
        return "estoy dentro del set";
    }

    public function setvendeVip($entradasPri) {
        Zona::$zonaVips -= $entradasPri;
        return "estoy dentro del set";
    }

    /* // METODO PARA LA VENTA
      public function vende($zonaElegida,$cantidadEntradasCompra) {
      if(($zonaElegida==1)&&(Zona::$zonaPrincipal>0)){
      Zona::$zonaPrincipal-=$cantidadEntradasCompra;
      return "vendidas <br>";
      }else{
      return "NO hay entradas en esta zona";
      }
      if(($zonaElegida==2)&&(Zona::$zonaCompraVenta>0)){
      Zona::$zonaCompraVenta-=$cantidadEntradasCompra;
      return "vendidas <br>";

      }else{
      return "NO hay entradas en esta zona";
      }
      if(($zonaElegida==3)&&(Zona::$zonaVips>0)){
      Zona::$zonaVips-=$cantidadEntradasCompra;
      return "vendidas <br>";
      }else{
      return "NO hay entradas en esta zona";
      }
      }
     */
}
?>
    
