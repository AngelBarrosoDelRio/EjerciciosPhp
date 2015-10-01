<!DOCTYPE html>
<!--
Realiza un programa que nos diga si hay probabilidad de que nuestra pareja nos está siendo
infiel. El programa irá haciendo preguntas que el usuario contestará con verdadero o falso. Puedes
utilizar radio buttons. Cada pregunta contestada como verdadero sumará 3 puntos. Las preguntas
contestadas con falso no suman puntos. Utiliza el fichero test_infidelidad.txt2 para obtener las
preguntas y las conclusiones del programa.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        1. Tu pareja parece estar más inquieta de lo normal sin ningún motivo aparente:<br>
        
        <form action="TestInfidelidad.php" method="get">
                <input type="radio" name="preg1" value="true" >Verdadero
                <br>
                <input type="radio" name="preg1" value="false">False
                <br>
        :<br>
        2. Ha aumentado sus gastos de vestuario:<br>
        <form action="TestInfidelidad.php" method="get">
                <input type="radio" name="preg2" value="true" >Verdadero
                <br>
                <input type="radio" name="preg2" value="false">False
                <br>
        3. Ha perdido el interés que mostraba anteriormente por ti:  <br>      
        <form action="TestInfidelidad.php" method="get">
                <input type="radio" name="preg3" value="true" >Verdadero
                <br>
                <input type="radio" name="preg3" value="false">False
                <br>
         4. Ahora se afeita y se asea con más frecuencia (si es hombre) o ahora se arregla el pelo y se asea con más frecuencia (si es mujer):<br>       
         <form action="TestInfidelidad.php" method="get">
                <input type="radio" name="preg4" value="true" >Verdadero
                <br>
                <input type="radio" name="preg4" value="false">False
                <br>
         5. No te deja que mires la agenda de su teléfono móvil: <br>      
         <form action="TestInfidelidad.php" method="get">
                <input type="radio" name="preg5" value="true" >Verdadero
                <br>
                <input type="radio" name="preg5" value="false">False
                <br>
        6. A veces tiene llamadas que dice no querer contestar cuando estás tú delante: <br>     
        <form action="TestInfidelidad.php" method="get">
                <input type="radio" name="preg6" value="true" >Verdadero
                <br>
                <input type="radio" name="preg6" value="false">False
                <br>
        7. Últimamente se preocupa más en cuidar la línea y/o estar bronceado/a: <br>     
        <form action="TestInfidelidad.php" method="get">
                <input type="radio" name="preg7" value="true" >Verdadero
                <br>
                <input type="radio" name="preg7" value="false">False
                <br>
        8. Muchos días viene tarde después de trabajar porque dice tener mucho más trabajo : <br>    
        <form action="TestInfidelidad.php" method="get">
                <input type="radio" name="preg8" value="true" >Verdadero
                <br>
                <input type="radio" name="preg8" value="false">False
                <br>
        9. Has notado que últimamente se perfuma más:    <br> 
        <form action="TestInfidelidad.php" method="get">
                <input type="radio" name="preg9" value="true" >Verdadero
                <br>
                <input type="radio" name="preg9" value="false">False
                <br>
         10. Se confunde y te dice que ha estado en sitios donde no ha ido contigo     <br>
        <form action="TestInfidelidad.php" method="get">
                <input type="radio" name="preg10" value="true" >Verdadero
                <br>
                <input type="radio" name="preg10" value="false">False
                <br>
                       
                
                <input type="submit" value="aceptar">
    </body>
</html>
