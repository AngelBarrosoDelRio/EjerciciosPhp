<!DOCTYPE html>
<!--
Realiza un programa que escoja al azar 5 palabras en español del mini-diccionario del ejercicio
anterior. El programa pedirá que el usuario teclee la traducción al inglés de cada una de las palabras
y comprobará si son correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas
y cuántas erróneas.

MI PRINCIPAL PROBLEMA ES QUE SE PIERDE EL VALOR DE $COMPARA.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $diccionario = array("perro" => "dog","gato"=>"cat","libro"=>"book",
            "desarrollador"=>"developer","coche"=>"car","hola"=>"hello","loro"=>"parrot",
            "bosque"=>forest,"cerveza"=>beer,"cama"=>bed,"casa"=>"house",
            "ordenador"=>"computer","raton"=>"mouse","marihuana"=>"weed"
            );
        
        foreach ($diccionario as $clave => $valor) {
            // Los elementos de este array se acceden por posición (0, 1, 2...). Ej: $palabrasEspanolas[0] devuelve "perro"
           $palabrasEspanolas[] = $clave;

         }
            
            
        $traduccion=$_GET['traduccion'];
        $cuentaPalabras=$_GET['cuentaPalabras'];
        $concatena=$_GET['concatena'];
        $seleccionadas=$_GET['seleccionadas'];
        
        if(!isset($traduccion)){
           $cuentaPalabras=0;
           $concatena="";
           
           

                echo "Debera decirme en este ejercicio la traduccion de estas cinco palabras a ingles: <br>";

            
            // $seleccionadasArray: array de numeros (sin repetidos)
            for ($i = 0; $i < 5; $i++) {
                do {
                    $numAleatorio = rand(0, 13);
                } while (in_array($numAleatorio, $seleccionadasArray));  // in_array($numeroAComprobarsi existe,$EnTodoElArray).
                
                $seleccionadasArray[] = $numAleatorio;
            }
            
            
            // $seleccionadas es una cadena de texto que guarda las palabras a traducir como un texto con las posiciones
            // de cada palabra separadas por un espacio en blanco. Esta variable es la que vamos a ir pasando en el <form>
            // entre peticiones HTTP
            $seleccionadas = "";
            foreach ($seleccionadasArray as $elemSel){       
                    if($seleccionadas==""){
                        $seleccionadas = $elemSel;
                    }else{
                        $seleccionadas = $seleccionadas.' '.$elemSel;
                    }
                    
            } 
            
                
            
    
           
        }else{
            //echo"estoy delante del for <br>";
            
            if($concatena==""){
                $concatena=$traduccion;
            }else{
                $concatena=$concatena.' '.$traduccion;
            }
            $cuentaPalabras++;
        }
        
        if($cuentaPalabras<5){
            
            $seleccionadasArray = explode(" ", $seleccionadas); 
            foreach ($seleccionadasArray as $elemSel){       //muestra la lista de palabras cada vez que pida un valor para no perder la lista.
                    echo $palabrasEspanolas[$elemSel],"<br>";// y no sepas que palabra era.
                    
            }
        
        ?>
        
        <form action="index.php" method="GET">
              
        Introduzca un palabra: <?php echo $cuentaPalabras; ?>
        
            <input type="text" name="traduccion" autofocus="">
            <input type="hidden" name="cuentaPalabras" value="<?= $cuentaPalabras ?>"><?php //el = es como e poner echo.?>
            <input type="hidden" name="concatena" value="<?php echo $concatena?>">
            <input type="hidden" name="seleccionadas" value="<?php echo $seleccionadas?>">
            <input type="submit" value="aceptar"><br>
        <?php
        
        }
        
        if($cuentaPalabras==5){

          
           $palabraIntro= explode(" ", $concatena); 
           $seleccionadasArray = explode(" ", $seleccionadas);
           //print_r($palabraIntro); // si sale
           
           $puntos=0;
            for($i=0;$i<5;$i++){
               //echo $palabraIntro[$i] . " - " . $seleccionadasArray[$i] . "<br>";
                if ($palabraIntro[$i] ==  $diccionario[$palabrasEspanolas[$seleccionadasArray[$i]]]){
                   $puntos++;
                }
            }
            
            echo "puntos acertados: ".$puntos."<br>";
            echo "puntos erroneos: ".(5-$puntos)."<br>";
        }
        ?>
    </body>
</html>
