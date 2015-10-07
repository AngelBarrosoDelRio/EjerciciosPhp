<!DOCTYPE html>
<!--
Realiza un programa que pinte una pirámide hueca por pantalla. La altura se debe pedir por teclado
mediante un formulario. La pirámide estará hecha de bolitas, ladrillos o cualquier otra imagen
de las 5 que se deben dar a elegir mediante un formulario.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="/Ejercicio_20/res/css/style.css" type="text/css"/>
    </head>
    <body>
        <div>
        <?php
        $altura=$_POST[altura];
        $espaciosDelanteros=$altura-1;
        $espaciosInternos=1;
        
        for($a=1;$a<$altura;$a++){
            
            if($a==1){
                for($i=1;$i<=$espaciosDelanteros+1;$i++){

                    echo "<img src='/Ejercicio_20/res/img/Blanco.jpg' />";
                }
             echo "<img src='/Ejercicio_20/res/img/bola.png'/>";
            }
            if(($a>1)&&($a<$altura)){
              
                
                for($i=$espaciosDelanteros-1;$i>0;$i--){

                    echo "<img src='/Ejercicio_20/res/img/Blanco.jpg' />";
                    
                }
                echo "<img src='/Ejercicio_20/res/img/bola.png'/>";
                for($j=0;$j<$espaciosInternos;$j++){
                    
                    echo "<img src='/Ejercicio_20/res/img/Blanco.jpg' />";
                    
                }
                
                 echo "<img src='/Ejercicio_20/res/img/bola.png'/>";
                
                $espaciosDelanteros--;
            }
            $espaciosInternos+=2;
         ?>
        <br>
        <?php
        }
        
        for($a=0;$a<($altura*2);$a++){
             echo "<img src='/Ejercicio_20/res/img/bola.png'/>";
        }
        echo "<img src='/Ejercicio_20/res/img/bola.png'/>";
        
        ?>
        <br>
        <a href="index.php">>>Volver</a>
        </div>
        
    </body>
</html>
