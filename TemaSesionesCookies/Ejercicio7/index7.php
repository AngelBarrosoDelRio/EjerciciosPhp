<!DOCTYPE html>
<!--
Escribe un programa que guarde en una cookie el color de fondo (propiedad background-color ) de
una página. Esta página debe tener únicamente algo de texto y un formulario para cambiar el color.
-->
<?php
        if (!isset($_COOKIE["fondo"])) {
        
        
            setcookie("fondo", "white", time() + 3*24*3600);
            $fondo="white";
        
        } else {
            $fondo = $_COOKIE["fondo"];
        
        }
        if (isset($_POST['fondo'])) {
            $fondo = $_POST['fondo'];
            setcookie("fondo", $fondo, time() + 3 * 24 * 3600);
        }
        
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="background-color: <?php echo $fondo ; ?>">
        <?php
        if (!isset($_COOKIE['fondo'])) {
          
            echo "No has elegido todavía el color de fondo? escribalo a continuacion (el color debera estar en ingles).<br>";
        
        ?>
        <form action="index7.php" method="post">
            color fondo: <input type="text" name ="fondo"value="<?=$fondo?>"><br>
        <input type="submit" value="Cambiar color">
        </form>
        <?php
        }else{ 
          echo "¿Quieres camabiarlo de nuevo?.<br>"; 
        ?>
             <form action="index7.php" method="post">
                color fondo: <input type="text" name ="fondo"value="<?=$fondo?>"><br>
            <input type="submit" value="Cambiar color">
            </form>  
        <?php
        }
        /*
         * Otra opcion
         <?php
            if (!isset($_COOKIE["color"])) {
              setcookie("color", "white", time() + 3 * 24 * 3600);
              $color = "white";
            } else {
              $color = $_COOKIE["color"];
            }

            if (isset($_POST['color'])) {
              $color = $_POST['color'];
              setcookie("color", $color, time() + 3 * 24 * 3600);
            }
            ?>
          <div id="minipagina" style="padding: 60px;">
              <p>Elige el color de fondo de la página.</p>
              <form action="pagina.php" method="post">
                <input type="hidden" name="ejercicio" value="07">
                <input type="color" name="color" value="<?=$color?>"><br><br>
                <input type="submit" value="Aceptar">
              </form>
            </div>
            <!--
              Se cambia el fondo de una "mini-página" dentro de la página principal para
              no perder la homogeneidad en los estilos respecto al resto de ejercicios.
              Si se quiere cambiar el color de fondo de la página completa, habría que
              cambiar la propiedad background-color de body.
            -->
            <script>document.getElementById("minipagina").style.background="<?=$color?>";</script>

                   */
        ?>
        
        
    </body>
</html>
