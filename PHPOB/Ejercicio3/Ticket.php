

<?php
session_start();
include_once 'Zona.php';
$cliente1 = unserialize($_SESSION['cliente']);
Zona::setzonaprincipal($_SESSION['zonaprincipal']);
Zona::setzonacompraventa($_SESSION['zonaCompraVenta']);
Zona::setzonavip($_SESSION['zonaVips']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TICKET</title>
    </head>
    <body>
        <?php
        $accion = $_POST['accion1'];

        if ($accion == "compra") {

            $opcion = $_POST['opcion'];
            $cantidad = $_POST['cantidad'];



            if (($opcion == 1) && (($_SESSION['zonaprincipal'] - $cantidad ) >= 0)) {
                Zona::setvendePrin($cantidad);
                echo "Ha comprado " . $cantidad . " entrada/s en la zona 'Principal'.";
            } else if (($opcion == 2) && (($_SESSION['zonaCompraVenta'] - $cantidad ) >= 0)) {
                Zona::setvendeCom($cantidad);
                echo "Ha comprado " . $cantidad . " entrada/s en la zona 'Compra Venta'.";
            } else if (($opcion == 3) && (($_SESSION['zonaVips'] - $cantidad ) >= 0)) {
                Zona::setvendeVip($cantidad);
                echo "Ha comprado " . $cantidad . " entrada/s en la zona 'VIPS'.";
            } else {
                echo "<h3> Lo lamento no quedan localidades disponibles en esa zona</h3>";
            }
            ?>
            <form action="CompraEntrada.php" method="post">
                ¿Desea efectuar otra compra? <br>           
                <input type="radio" name="accion" value="si" checked> SI
                <br>
                <input type="radio" name="accion" value="no"> NO
                <br>
                <input type="submit" value="Volver">
            </form>

            <?php
        }

        $_SESSION['cliente'] = serialize($cliente1);
        $_SESSION['zonaprincipal'] = Zona::getzonaPrincipal();
        $_SESSION['zonaCompraVenta'] = Zona::getzonaCompraVenta();
        $_SESSION['zonaVips'] = Zona::getzonaVips();
        ?>
    </body>
</html>
