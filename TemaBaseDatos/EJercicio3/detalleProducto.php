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
        <link type="text/css" rel="stylesheet" href="/EJercicio3/res/css/cssTiendaOnline.css">
        <title></title>
    </head>
    <body>
        <?php
        $codigo = $_POST['codigo'];
        $producto = $_SESSION['producto'];
        $elemento = $producto[$codigo];
  
        
        
        foreach ($producto as $cod => $elemento) {
            
            if($codigo==$cod){
                
          ?>
        <div class="catalagoDetalle">
          <table>
              <tr>
                <td><img src="/EJercicio3/res/img/<?=$elemento[imagen]?>"></td>

                <td>
                    <?=$elemento[descripcion]?><br><?=$elemento[nombre]?><br>Precio: <?=$elemento[precio]?> €<br><?=$elemento[stock]?>
                      <form action="index.php" method="post">            
                        <input type="hidden" name="codigo" value="<?=$codigo?>">
                        <input type="hidden" name="accion" value="comprar">
                        <input type="submit" value="Comprar">
                      </form>
                </td> 
                
              </tr>
          
          
        <?php
            }
        }
        ?>
        </table>
        </div>
          <form action="index.php" method="post">            
            
            <input type="submit" value="volver a la tienda">
          </form>
        
    </body>
</html>
