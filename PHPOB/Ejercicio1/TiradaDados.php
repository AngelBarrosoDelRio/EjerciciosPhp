
<?php
session_start();
include_once 'Dado.php';
if (!isset($_SESSION['tiradasTotales'])) {
    $_SESSION['tiradasTotales'] = 0;
}
if (!isset($_SESSION['numTiradas'])) {
    $_SESSION['numTiradas'] = 0;
}

DadoPoker::setTiradasTotales($_SESSION['tiradasTotales']);
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $dado1 = new DadoPoker();
        $dado2 = new DadoPoker();
        $dado3 = new DadoPoker();
        $dado4 = new DadoPoker();
        $dado5 = new DadoPoker();
        $accion = $_POST['seguir'];


        if ((!isset($accion)) || ($accion == "no")) {

            $dado1->tirada();
            $dado2->tirada();
            $dado3->tirada();
            $dado4->tirada();
            $dado5->tirada();
            $_SESSION['numTiradas'] ++;
            echo "<h3> Esta es su " . $_SESSION['numTiradas'] . "º tirada.</h3>";
            echo "dado1: " . $dado1->getFiguraObtenida() . "<br>";
            echo "dado2: " . $dado2->getFiguraObtenida() . "<br>";
            echo "dado3: " . $dado3->getFiguraObtenida() . "<br>";
            echo "dado4: " . $dado4->getFiguraObtenida() . "<br>";
            echo "dado5: " . $dado5->getFiguraObtenida() . "<br>";

            echo "Ha tirado usted un total de : " . DadoPoker::getTiradasTotales() . " dados. <br>";
            echo "¿ Desea salir del programa ? [si/no] ";
            ?>
            <form action="TiradaDados.php" method="post">
                <input type="text" name="seguir">
                <input type="hidden" name="accion" value="continuar">
                <input type="submit" value="aceptar">


            </form>
            <?php
        } else {
            echo"<h3>Adios vuelva pronto!!</h3>";
            session_destroy();
        }
        $_SESSION['tiradasTotales'] = DadoPoker::getTiradasTotales();
        ?>
    </body>
</html>
