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
        $hora=$_GET[hora];
        
        if(($hora>=0)&&($hora<12)){
            echo "buenos dias!!";
        }else if(($hora>=12)&&($hora<19)){
            echo "buenas tardes";
        }else if(($hora>=19)&&($hora<=24)){
            echo "buenas noches";
        }else if($hora>24){
            echo "esa hora no existe";
        }
        ?>
    </body>
</html>
