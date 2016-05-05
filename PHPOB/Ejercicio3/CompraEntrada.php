<?php
session_start();
include_once 'Zona.php';


if (!isset($_SESSION['cliente'])) {

    $_SESSION['cliente'] = serialize(new Zona());
}


if (!isset($_SESSION['zonaprincipal'])) {
    $_SESSION['zonaprincipal'] = 1000;
}
if (!isset($_SESSION['zonaCompraVenta'])) {
    $_SESSION['zonaCompraVenta'] = 200;
}
if (!isset($_SESSION['zonaVips'])) {
    $_SESSION['zonaVips'] = 25;
}

$cliente1 = unserialize($_SESSION['cliente']);
Zona::setzonaprincipal($_SESSION['zonaprincipal']);
Zona::setzonacompraventa($_SESSION['zonaCompraVenta']);
Zona::setzonavip($_SESSION['zonaVips']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //$prueba=Zona::getzonaPrincipal;
        $accionVolverComprar = $_POST['accion'];

        if ((!isset($_POST['accion'])) || ($accionVolverComprar == "si")) {
            echo "<h3>¿En que zona desea la entrada y cuantas entradas desea comprar? <br>"
            . "1) zona principal <br> 2) zona compra venta<br> 3) vips </h3>";
            ?>
            <form action="Ticket.php" method="post">
                Zona:    <select name="opcion">
                    <option value="1">Principal</option>
                    <option value="2">Compra Venta</option>
                    <option value="3">VIPS</option>

                </select>
                Nº entradas:    <input type="number" name="cantidad"><br>
                <input type="hidden" name="accion1" value="compra"><br>
                <input type="submit" value="vender"><br>
            </form>

            <?php
            echo"<h4> Entradas disponibles</h4>";
            echo "principal: " . Zona::getzonaPrincipal() . "<br>";
            echo "compraventa: " . Zona::getzonaCompraVenta() . "<br>";
            echo "vips: " . Zona::getzonaVips() . "<br>";
            
        } else if ($accionVolverComprar == "no") {
            echo "<h1> GRACIASSS POR SU COMPRA VUELVA PRONTOO!!!</h1>";
            session_destroy();
        }
        $_SESSION['cliente'] = serialize($cliente1);
        $_SESSION['zonaprincipal'] = Zona::getzonaPrincipal();
        $_SESSION['zonaCompraVenta'] = Zona::getzonaCompraVenta();
        $_SESSION['zonaVips'] = Zona::getzonaVips();
        ?>
    </body>
</html>
