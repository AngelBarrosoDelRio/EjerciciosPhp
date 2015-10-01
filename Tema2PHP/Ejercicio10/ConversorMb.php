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
        $mb=$_GET[MB];
        $kb=1024;
        
        echo $mb," MB equivalen a ", $kb/$mb," KB"
        ?>
    </body>
</html>
