<!DOCTYPE html>
<!--
ealiza un minicuestionario con 10 preguntas tipo test sobre las asignaturas que se imparten en
el curso. Cada pregunta acertada sumará un punto. El programa mostrará al final la calificación
obtenida. Pásale el minicuestionario a tus compañeros y píde
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $res1=$_GET[preg1];
        $res2=$_GET[preg2];
        $res3=$_GET[preg3];
        $res4=$_GET[preg4];
        $res5=$_GET[preg5];
        $puntos=0;
        
        if($res1=="lenguaje"){
            $puntos++;
        }
        
        if($res2=="netbeans"){
            $puntos++;
        }
        
        if($res3=="luis"){
            $puntos++;
        }
        
        if($res4=="array"){
            $puntos++;
        }
        
        if($res5=="ubuntu"){
            $puntos++;
        }
            
        
        echo "tiene ",$puntos," puntos";
        ?>
    </body>
</html>
