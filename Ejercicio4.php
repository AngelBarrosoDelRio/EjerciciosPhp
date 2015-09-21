<!DOCTYPE html>
<!--
Escribe un programa que muestre tu horario de clase mediante una tabla. Aunque se puede hacer
íntegramente en HTML (igual que los ejercicios anteriores), ve intercalando código HTML y PHP
para familiarizarte con éste último.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            td{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <table border="2px" border="blue">
            <tr>
                <td><?php echo "lunes"?></td>
                <td><?php echo "Martes"?></td>
                <td><?php echo "Miercoles"?></td>
                <td><?php echo "Jueves"?></td>
                <td><?php echo "Viernes"?></td>
            </tr>
            <tr>
                <td><?php echo "DWES"?></td>
                <td><?php echo "PROG"?></td>
                <td><?php echo "DWES"?></td>
                <td><?php echo "PROG"?></td>
                <td><?php echo "BBDD"?></td>
            </tr>
            <tr>
                <td><?php echo "DWES"?></td>
                <td><?php echo "PROG"?></td>
                <td><?php echo "DWES"?></td>
                <td><?php echo "PROG"?></td>
                <td><?php echo "BBDD"?></td>
            </tr>
            <tr>
                <td><?php echo "DWES"?></td>
                <td><?php echo "PROG"?></td>
                <td><?php echo "DWES"?></td>
                <td><?php echo "PROG"?></td>
                <td><?php echo "DIW"?></td>
            </tr>
            <tr>
                <td colspan="5"><?php echo "DESCANSO"?></td> <!--colspan para fundir celdas de una fila.-->
                
            </tr>
            <tr>
                <td><?php echo "PROG"?></td>
                <td><?php echo "BBDD"?></td>
                <td><?php echo "HLC"?></td>
                <td><?php echo "EINEM"?></td>
                <td><?php echo "DIW"?></td>
            </tr>
            <tr>
                <td><?php echo "DIW"?></td>
                <td><?php echo "BBDD"?></td>
                <td><?php echo "HLC"?></td>
                <td><?php echo "EINEM"?></td>
                <td><?php echo "DWES"?></td>
            </tr>
            <tr>
                <td><?php echo "DIW"?></td>
                <td><?php echo "BBDD"?></td>
                <td><?php echo "HLC"?></td>
                <td><?php echo "EINEM"?></td>
                <td><?php echo "DWES"?></td>
            </tr>
        </table>
    </body>
</html>
