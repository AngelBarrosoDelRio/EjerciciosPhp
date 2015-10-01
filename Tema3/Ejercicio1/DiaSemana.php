<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $diaIntro=$_GET[dia];
        
        switch($diaIntro) {
            case "lunes":
                echo"Tiene DWES";
            break;
            case "martes":
                echo"Tiene PROG.";
            break;
            case "miercoles":
                echo"Tiene BBDD ";
            break;
            case "jueves":
                echo"Tiene EINEM";
            break;
            case "viernes":
                echo"Tiene DIW";
            break;
            default :
                echo "Dia introducido incorrecto";
        }
        ?>
    </body>
</html>
