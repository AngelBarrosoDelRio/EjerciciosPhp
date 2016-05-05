<!DOCTYPE html>
<!--
Establece un control de acceso mediante nombre de usuario y contraseña para cualquiera de los
programas de la relación anterior. La aplicación no nos dejará continuar hasta que iniciemos sesión
con un nombre de usuario y contraseña correctos.
-->
<?php

        session_start();
        
        $_SESSION['usuario']=$nombre;
        $_SESSION['contraseña']=$contraseña;
        
        if(!isset($_SESSION['logueado'])){ // creo esto para que no se pierda la sesion una vez introducido nombre y contraseña
            $_SESSION['logueado']=false;
        }

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        
        $nombre=$_POST['nombre'];
        $contraseña=$_POST['contraseña'];
        
        
        if(!$_SESSION['logueado']){
        echo "<p>Por favor introduzca su nombre de usuario y contraseña.</p>";
        ?>
        <form action="index4.php" method="post">
              <input type="hidden" name="ejercicio" value="01">
              <p>Usuario:</p>
              <input type="text" name="nombre" autofocus>
              <p>Contraseña:</p>
              <input type="password" name="contraseña">
              <input type="submit" value="Aceptar">
            </form> 
        <?php
        }
        
        if(isset($nombre)&&(isset($contraseña))){
            
            if(($nombre=="angel")&&($contraseña=="1234")){
                $_SESSION['logueado']=true;
                header("Location:/Ejercicio3/index3.php"); // recarga la página
                 //header("Refresh: 0; url=index3.php", true, 303);
            } else {
            echo '<span style="color: red">Contraseña incorrecta. Inténtelo de nuevo.</span><br><br>';
            header("Refresh: 3; url=index4.php?ejercicio=04", true, 303); // recarga la página
            }
        }
        /*if ($_SESSION['logueado']) { // si  $_SESSION['logueado']=true entra aqui    
                echo"<p>Este programa calcula la media, la suma y la cantidad de los números introducidos.<br>
                        Vaya introduciendo números (el programa parará cuando la suma de ellos sea mayor a 1000).
                    </p>";

                $n = $_POST['n'];
                
                if (!isset($n)){
                    $_SESSION['cuentaNumeros']=0;
                    $_SESSION['sumaNum']=0;
                
                    
                }else{
                    $_SESSION['sumaNum']+=$n;
                    $_SESSION['cuentaNumeros']++;

                }
                
                if (!isset($n) || ($_SESSION['sumaNum'] < 1000)) {

                  ?>
                  <form action="index4.php" method="post">
                    <input type="hidden" name="ejercicio" value="01">
                    <input type="number" name="n" autofocus>
                    <input type="submit" value="Aceptar">
                  </form>   
                  <?php
                }
                
                if($_SESSION['sumaNum']>= 1000){
                      echo "Ha introducido  " . $_SESSION['cuentaNumeros'] . " numeros.<br>";
                      echo "La suma de los todos los numeros introdicidos es:  " . $_SESSION['sumaNum'] . "<br>";
                      echo "La media de los numeros introducidos es:  " . $_SESSION['sumaNum']/$_SESSION['cuentaNumeros'] . "<br>";
                      session_destroy();             

                }
              
            }
        */
          ?>
    </body>
</html>
