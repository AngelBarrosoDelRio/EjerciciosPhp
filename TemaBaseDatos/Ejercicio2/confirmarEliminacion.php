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
        
        if($_POST['accion'] == "eliminar") {
            $dni = $_POST['dni'];
            echo "¿Desea elimnar al Cliente con DNI: ". $dni ."- [si/no]" ; 
        ?>
        
         <form action="index.php" method="post">
                    
                    <input type="hidden" name="dni" value="<?=$dni?>">
                    <input type="text" name="confirmarEliminar" >
                    <input type="submit" value="aceptar">
                  </form>
        
        <?php
        }
        ?>
    </body>
</html>
