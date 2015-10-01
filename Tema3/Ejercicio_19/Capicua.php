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
        $numIntro=$_GET[n];
        
        if(($numIntro)==(strrev($numIntro))){
            
            echo "Son capicuas";
        } else { 
           
            echo" No son capicuas";
        }
        
        ?>
    </body>
</html>
