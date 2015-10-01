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
        
        $euros= 166.75;
        $resultado=$_GET[pesetas]/$euros;
        
        echo $_GET[pesetas]," pesetas en euros son ";
        printf ("%.2f", $resultado ,"€");
        
        ?>
    </body>
</html>
