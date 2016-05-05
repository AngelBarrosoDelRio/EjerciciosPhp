<!DOCTYPE html>
<!--
Realiza un programa que escoja al azar 5 palabras en inglés de un mini-diccionario. El programa
pedirá que el usuario teclee la traducción al español de cada una de las palabras y comprobará si son
correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas.
La aplicación debe tener una opción para introducir los pares de palabras (inglés - español) que se
deben guardar en cookies; de esta forma, si de vez en cuando se dan de alta nuevas palabras, la
aplicación puede llegar a contar con un número considerable de entradas en el mini-diccionario.
-->
<?php

session_start();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (!isset($_SESSION['diccionario'])) {
            $_SESSION['diccionario'] = array (
            "ordenador" => "computer",
            "gato" => "cat",      
            "rojo" => "red",
            "árbol" => "tree",
            "pingüino" => "penguin",
            "sol" => "sun",
            "agua" => "water",
            "viento" => "wind",
            "siesta" => "nap",
            "arriba" => "up",
            "ratón" => "mouse",
            "estadio" => "arena",
            "calumnia" => "aspersion",
            "aguacate" => "avocado",
            "cuerpo" => "body",
            "concurso" => "contest",
            "cena" => "dinner",
            "salida" => "exit",
            "lenteja" => "lentil",
            "cacerola" => "pan",
            "pastel" => "pie",
            "membrillo" => "quince"
          );
        }
          
        $diccionario = $_SESSION['diccionario'];
        
        if(!isset($_POST['espanol'])){
            
            echo "Digame la traduccion de estas palabras.";
            
            foreach ($diccionario as $codigo => $elemento) {
                
                $palabraEspanola[]=$codigo;
                
            }
            
            $contador=0;
            $espanol=array();
            do{
               $palabraSeleccionada=$palabraEspanola[rand(0, count($diccionario)-1)];
               
               if(!in_array($palabraSeleccionada, $espanol)){
                   $espanol[]=$palabraSeleccionada;
                   $contador++;
               }
                
            }while($contador<5);
            
            echo '<form action="index8.php" method="post">';
            for ($i = 0; $i < 5; $i++) {
              echo $espanol[$i]." ";
              echo '<input type="hidden" name="espanol['.$i.']" value="'.$espanol[$i].'">';
              echo '<input type="text" name="ingles['.$i.']" ><br>';
            }
            echo '<input type="submit" value="Aceptar">';
            echo '</form>';
          }  else {
              
              $espanol=$_POST['espanol'];
              $ingles=$_POST['ingles'];
              $cuentaPuntos=0;
              for($i=0;$i<5;$i++){
                  if($diccionario[$espanol[$i]]==$ingles[$i]){
                      $cuentaPuntos++;
                  }
              }
              
              echo" Ha obtenido una puntuación de ".$cuentaPuntos;
          }
        
        ?>
        <hr>
        <form action="index8.php" method="post">
            <input type="hidden" name="index8">
            <input type="submit" value="volver a jugar">
        </form>
        <form action="administracionPalabras.php" method="post">
            <input type="hidden" name="anadirPalabras">
            <input type="submit" value="Añadir palabras nuevas">
        </form>
    </body>
</html>
