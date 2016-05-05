<!DOCTYPE html>
<!--
Realiza un programa que escoja al azar 10 cartas de la baraja española y que diga cuántos puntos
suman según el juego de la brisca. Emplea un array asociativo para obtener los puntos a partir del
nombre de la figura de la carta. Asegúrate de que no se repite ninguna carta, igual que si las hubieras
cogido de una baraja de verdad.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            
        $puntuacion=array(
            'as'=>11, 'dos'=>0, 'tres'=>10,'cuatro'=>0,'cinco'=>0,'seis'=>0,
            'siete'=>0,'ocho'=>0,'nueve'=>0,'diez'=>0,'sota'=>2,'caballo'=>3,
            'rey'=>4);
        
        $figura=array('as','dos','tres','cuatro','cinco','seis',
            'siete','ocho','nueve','diez','sota','caballo','rey');
        
        $palo=array('oros','copas','bastos','espadas');
        $cartasEchadas = "";
        $cuentaCartas=0;
        $sumaPuntos=0;
        
        do{
          
            $figuraObtenida=$figura[rand(0, 12)];
            $paloObtenido=$palo[rand(0, 3)];
            $puntuacionCarta=$puntuacion[$figuraObtenida];
            $nombreCarta="$figuraObtenida de $paloObtenido";
            
            if(!in_array($nombreCarta, $cartasEchadas)){
                
                echo "$nombreCarta - $puntuacionCarta puntos<br>";
                $cartasEchadas[] = $nombreCarta;
                $cuentaCartas++;
                $sumaPuntos += $puntuacionCarta;
            }
            
        
            
        }while($cuentaCartas<10);
        
        echo"<br>Ha obtenido $sumaPuntos puntos";
        ?>
    </body>
</html>
