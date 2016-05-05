<!DOCTYPE html>
<!--
Crea un mini-diccionario español-inglés que contenga, al menos, 20 palabras (con su traducción).
Utiliza un array asociativo para almacenar las parejas de palabras. El programa pedirá una palabra
en español y dará la correspondiente traducción en inglés.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $diccionario = array("perro" => "dog","gato"=>"cat","libro"=>"book","desarrollador"=>"developer","coche"=>"car");
        $palabra=$_GET['palabra'];
        
        if(!isset($palabra)){
        ?>
        <p>por favor introduzca un palabra española y le dire su traduccion:</p> 
        
        <form action="index.php" method="GET">
            Introduzca un palabra:
            <input type="text" name="palabra" autofocus="">
            <input type="submit" value="aceptar">
        <?php
        }else{
        echo "La traduccion de ","$palabra"," - ", $diccionario[$palabra] ;
        }
        ?>
    </body>
</html>
