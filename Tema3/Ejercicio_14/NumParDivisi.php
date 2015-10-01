<!DOCTYPE html>
<!--
Realiza un programa que diga si un número introducido por teclado es par y/o divisible entre 5.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $nIntr=$_GET[n];
        
        if(($nIntr%5==0)||($nIntr%2==0)){
            
            if(($nIntr%5==0)&&($nIntr%2==0)){

                echo "Este numero",$nIntr," es divisible entre 5 y par"; 
            }else if($nIntr%2==0){
            
                echo "Este numero",$nIntr," es par";
            
            } else if($nIntr%5==0){

                echo "Este numero",$nIntr," es divisible entre 5"; 

            }
        }
        if((!$nIntr%5==0)&&(!$nIntr%2==0)){

                echo "Este numero ",$nIntr," no es PAR ni DIVISIBLE entre 5"; 
            }
            
        
        
        ?>
    </body>
</html>
