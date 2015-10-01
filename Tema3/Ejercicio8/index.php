<!DOCTYPE html>
<!--
Amplía el programa anterior para que diga la nota del boletín (insuficiente, suficiente, bien, notable
o sobresaliente).
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        A continuacion se piden sus notas para realizar la media del curso.<br>
        
        Asignatura 1:<br>
        
        <form action="BoletinNotas.php" method="get">
            <input type="numero" name="asig1"><br>
        Asignatura 2:<br>
        
        <form action="BoletinNotas.php" method="get">
            <input type="numero" name="asig2"><br>
        Asignatura 3:<br>
        
        <form action="BoletinNotas.php" method="get">
            <input type="numero" name="asig3"><br>
            <input type="submit" value="aceptar">
    </body>
</html>
