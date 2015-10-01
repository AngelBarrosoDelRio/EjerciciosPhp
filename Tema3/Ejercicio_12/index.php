<!DOCTYPE html>
<!--
Realiza un minicuestionario con 10 preguntas tipo test sobre las asignaturas que se imparten en
el curso. Cada pregunta acertada sumará un punto. El programa mostrará al final la calificación
obtenida. Pásale el minicuestionario a tus compañeros y píde
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        A continuacion se muestra un cuestionario sobre diversos temas. Cada pregunta acertada sumara '3' puntos y los fallos no restaran.
        <br>
        1º ¿Qué es Java?:<br>
        
        <form action="Cuestionario.php" method="get">
                <input type="radio" name="preg1" value="lenguaje" checked>Tipo lenguaje.
                 <br>
                <input type="radio" name="preg1" value="programa">Un programa.
                <br>
                <input type="radio" name="preg1" value="falso">ambas son falso.
                <br>
       
        2º ¿Que programa usamos para Java en clase?:<br>
        
        <form action="Cuestionario.php" method="get">
                <input type="radio" name="preg2" value="word" >Word.
                <br>
                <input type="radio" name="preg2" value="netbeans">Netbeans.
                <br>
                <input type="radio" name="preg2" value="mysql">MySQL.
                <br>
        
        3º ¿Quien da clase de programacion?:<br>
        
        <form action="Cuestionario.php" method="get">
                <input type="radio" name="preg3" value="luis" >Luis
                <br>
                <input type="radio" name="preg3" value="eva">Eva
                <br>
                <input type="radio" name="preg3" value="juan carlos">Juan Carlos
                <br>
        
        4º ¿Como se crea un Array en Java?:<br>
        
        <form action="Cuestionario.php" method="get">
                <input type="radio" name="preg4" value="array" > int[] nom_array= new int[n];.
                <br>
                <input type="radio" name="preg4" value="comparacion">variable1<=variable2.
                <br>
                <input type="radio" name="preg4" value="variable">int nombre="nomb_alumn";.
                <br>        
        
        5º ¿SO en el que se trabaja en programacion?:<br>
        
        <form action="Cuestionario.php" method="get">
                <input type="radio" name="preg5" value="windows" >windows
                <br>
                <input type="radio" name="preg5" value="ubuntu">Ubuntu
                <br>
                <input type="radio" name="preg5" value="mac">Apple
                <br>        
                
                <input type="submit" value="aceptar">
    </body>
</html>
