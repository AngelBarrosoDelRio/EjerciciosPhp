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
        $nIntr=$_GET[n];
        
        if(($nIntr>=0)&&($nIntr<10)){
            
            echo "la cifra es: ",$nIntr;
        }
        if(($nIntr>=10)&&($nIntr<100)){
            $primera=$nIntr/10;
            
        }
        if(($nIntr>=100)&&($nIntr<1000)){
            
            $primera=$nIntr/100;
            
            
        }
        if(($nIntr>=1000)&&($nIntr<10000)){
            
            $primera=$nIntr/1000;
            
        }
        if(($nIntr>=10000)&&($nIntr<100000)){
            
            $primera=$nIntr/10000;
            
        }
        echo "la primera cifra es: ",floor($primera);
        
        ?>
    </body>
</html>
