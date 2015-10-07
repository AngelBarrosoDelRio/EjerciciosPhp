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
        $nIntro=$_POST[n];
        $digitos=1;
        
        $n=$nIntro;
        
        while($nIntro>9){
            
            $nIntro= floor($nIntro/10);
            $digitos++;
        
            
        }
        
        echo"el numero introducido ",$n," esta compuesto por ",$digitos," digitos";
       
        ?>
    </body>
</html>
