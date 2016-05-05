<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include_once 'Coche.php';
include_once 'Bicicleta.php';


$cochesCreados = 0;

if (!isset($_SESSION['coche'])) {

    $_SESSION['coche'] = serialize(new Coche("Saab", "93"));
    $cochesCreados++;
}
if (!isset($_SESSION['bicicleta'])) {

    $_SESSION['bicicleta'] = serialize(new Bicicleta("MontanBike", "Gensis"));
    $cochesCreados++;
}

if (!isset($_SESSION['kmTotal'])) {
    $_SESSION['kmTotal'] = 0;
}
if (!isset($_SESSION['VehiculosCreados'])) {
    $_SESSION['VehiculosCreados'] = $cochesCreados;
}

$cocheDeLuis = unserialize($_SESSION['coche']);
$biciPaco = unserialize($_SESSION['bicicleta']);
Vehiculo::setkilometrajeTotal($_SESSION['kmTotal']);
Vehiculo::setVehiculosCreados($_SESSION['VehiculosCreados']);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*
          $cocheJose = new Coche("Saab", "93");
          $biciPepe = new Bicicleta("MontanBike", "Gensis");
          $cocheJose->KmRecorridos(20);
          $biciPepe->KmRecorridos(20); */



        if ($_POST['accion'] == "kmCocheInicia") {
            $km = $_POST['kmCoche'];
            $_SESSION['kmTotal']+=$km;
            $cocheDeLuis->KmRecorridos($km);
            Vehiculo::setkilometrajeTotal($km);


            //echo "Ha recorrido " . $cocheDeLuis->getKilometraje() . " Km con el coche<br>";
        }
        if ($_POST['accion'] == "kmBiciInicia") {
            $km = $_POST['kmBici'];
            $_SESSION['kmTotal']+=$km;
            $biciPaco->KmRecorridos($km);
            Vehiculo::setkilometrajeTotal($km);

            //echo "Ha recorrido " . $biciPaco->getKilometraje() . " Km con la bicicleta<br>";
        }
        ?>
        <h3>Elija una de las siguientes opciones por favor: </h3>
        <table border="1">
            <tr>
                <td>
                    OPCIONES
                </td>

            </tr>
            <tr>
                <td>
                    1
                </td>
                <td>
                    anda con la bicicleta.
                </td>
            </tr>
            <tr>
                <td>
                    2
                </td>
                <td>
                    Anda con el coche.

                </td>
            </tr>
            <tr>
                <td>
                    3
                </td>
                <td>
                    Haz el caballito con la bicicleta.
                </td>
            </tr>
            <tr>
                <td>
                    4
                </td>
                <td>
                    Quema rueda con el coche.
                </td>
            </tr>
            <tr>
                <td>
                    5
                </td>
                <td>
                    Ver kilometraje de la bicicleta.
                </td>
            </tr>
            <tr>
                <td>
                    6
                </td>
                <td>
                    Ver kilometraje del coche.
                </td>
            </tr>
            <tr>
                <td>
                    7
                </td>
                <td>
                    Ver kilometraje total.
                </td>
            </tr>
            <tr>
                <td>
                    8
                </td>
                <td>
                    Salir del programa.
                </td>
            </tr>
            <tr>
                <td>
                    opcion: 
                </td>
                <td>
                    <form action="index.php" method="post">
                        <input type="number" name="opcion">
                    </form>
                </td>
            </tr>
        </table>
        <?php
        $opcion = $_POST['opcion'];
        if ($opcion != 8) {
            /// EVALUO LAS OPCION ESCOGIDA POR EL USUARIO.

            switch ($opcion) {
                case 1:
                    if (!isset($km)) {
                        ?>
                        ¿cuantos kilometros ando con la bicicleta?
                        <form action="index.php" method="post">
                            <input type="number" name="kmBici">
                            <input type="hidden" name="accion" value="kmBiciInicia">
                        </form>
                        <?php
                    }

                    break;
                case 2:
                    if (!isset($km)) {
                        ?>
                        ¿cuantos kilometros ando con la coche?
                        <form action="index.php" method="post">
                            <input type="number" name="kmCoche">
                            <input type="hidden" name="accion" value="kmCocheInicia">
                        </form>
                        <?php
                    }


                    break;
                case 3:

                    echo $biciPaco->hazCaballito();

                    break;

                case 4:

                    echo $cocheDeLuis->quemaRuedas();

                    break;

                case 5:

                    echo "Ha recorrido " . $biciPaco->getKilometraje() . " Km con la bicicleta<br>";

                    break;

                case 6:

                    echo "El coche de Luis ha recorrido " . $cocheDeLuis->getKilometraje() . "Km<br>";

                    break;

                case 7:

                    echo "El kilometraje total ha sido de " . Vehiculo::getkilometrajeTotal() . "Km";


                    break;


                default:
                    break;
            }
            echo "El coches creados " . Vehiculo::getVehiculosCreados();
            //echo "El coches creados session" .$_SESSION['VehiculosCreados'] ;

            $_SESSION['coche'] = serialize($cocheDeLuis);
            $_SESSION['bicicleta'] = serialize($biciPaco);
            $_SESSION['kmTotal'] = Vehiculo::getkilometrajeTotal();
        } else {

            session_destroy();
        }
        ?>
    </body>
</html>
