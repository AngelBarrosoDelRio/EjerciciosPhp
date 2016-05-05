<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        include 'vars.php';
        
        
        $codigo = $_POST['codigo'];
        
        foreach ($productos as $cod => $elemento) {
            if($codigo==$cod){
                
          ?>
           <br>
          <img src="/Ejercicio6/res/imagenes/<?=$elemento[imagen]?>" width="360" border="1"><br>
          <?=$elemento[detalle]?><br><?=$elemento[nombre]?><br>Precio: <?=$elemento[precio]?> €
          <form action="index6.php" method="post">            
            <input type="hidden" name="codigo" value="<?=$codigo?>">
            <input type="hidden" name="accion" value="comprar">
            <input type="submit" value="Comprar">
          </form>
          <br><br>
        <?php
            }
        }
        ?>
          <form action="index6.php" method="post">            
            
            <input type="submit" value="volver a la tienda">
          </form>
    </body>
</html>
