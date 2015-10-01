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
        $res1=$_GET[preg1];
        $res2=$_GET[preg2];
        $res3=$_GET[preg3];
        $res4=$_GET[preg4];
        $res5=$_GET[preg5];
        $res6=$_GET[preg6];
        $res7=$_GET[preg7];
        $res8=$_GET[preg8];
        $res9=$_GET[preg9];
        $res10=$_GET[preg10];
        $puntos=0;
        
        if($res1=="true"){
            $puntos+=3;
        }
        if($res2=="true"){
            $puntos+=3;
        }
        if($res3=="true"){
            $puntos+=3;
        }
        if($res4=="true"){
            $puntos+=3;
        }
        if($res5=="true"){
            $puntos+=3;
        }
        if($res6=="true"){
            $puntos+=3;
        }
        if($res7=="true"){
            $puntos+=3;
        }
        if($res8=="true"){
            $puntos+=3;
        }
        if($res9=="true"){
            $puntos+=3;
        }
        if($res10=="true"){
            $puntos+=3;
        }
        
        
        if(($puntos>=0)&&($puntos<=10)){
            
            echo "Tu puntiacion a sido ",$puntos," ¡Enhorabuena! tu pareja parece ser totalmente fiel.";
        }
        if(($puntos>10)&&($puntos<=22)){
            
            echo "Tu puntiacion a sido ",$puntos,"  Quizás exista el peligro de otra persona en su vida o "
                    . "en su mente, aunque seguramente será algo sin importancia. No bajes la guardia.";
        }
        if(($puntos>22)&&($puntos<=30)){
            
            echo "Tu puntiacion a sido ",$puntos,"  Tu pareja tiene todos los ingredientes para estar viviendo"
                    . " un romance con otra persona. Te aconsejamos que indagues un poco más y averigües que es "
                    . "lo que está pasando por su cabeza.";
        }
         
        ?>
    </body>
</html>
