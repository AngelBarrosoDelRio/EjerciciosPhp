<!DOCTYPE html>
<!--
Realiza un programa que pida 10 números por teclado y que los almacene en un array. A
continuación se mostrará el contenido de ese array junto al índice (0 – 9). Seguidamente el programa
pedirá dos posiciones a las que llamaremos “inicial” y “final”. Se debe comprobar que inicial es
menor que final y que ambos números están entre 0 y 9. El programa deberá colocar el número de
la posición inicial en la posición final, rotando el resto de números para que no se pierda ninguno.
Al final se debe mostrar el array resultante.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $n=$_GET['n'];
        $cuentaNum=$_GET['cuentaNum'];
        $concatena=$_GET['concatena'];
        
        if(!isset($n)){
            $cuentaNum=0;
            $concatena="";
        }else{
            if($concatena==""){
                $concatena=$n;
            }else{
                $concatena=$concatena.' '.$n;
            }
            $cuentaNum++;
        }
        
        if($cuentaNum<10){
            
        ?>
        <form action="index.php" method="GET">
            Introduzca un numero:
            <input type="number" name="n" autofocus="">
            <input type="hidden" name="cuentaNum" value="<?= $cuentaNum ?>"><?php //el = es como e poner echo.?>
            <input type="hidden" name="concatena" value="<?php echo $concatena?>">
            <input type="submit" value="aceptar">
        </form>
        <?php
        }
        
        if($cuentaNum==10){
            
            $numero= explode(" ", $concatena);
            foreach ($numero as $elemento){
                echo $elemento,", ";
            }
            
        
        ?>
        <form action="index.php" method="GET">
            Introduzca un numero inicial:
            <input type="number" name="inicial" autofocus="">
            Introduzca un numero final:
            <input type="number" name="final" autofocus="">
            <input type="hidden" name="cuentaNum" value="12">
            <input type="hidden" name="concatena" value="<?php echo $concatena; ?>">
            <input type="hidden" name="n" value="basura">
            <input type="submit" value="aceptar">
        </form>
        <?php
        
        }
        //print_r(get_defined_vars());
        //echo $cuentaNum;
        
        // pongo 13 xk en la linea 31 al poner en el
        //segundo formulario k 'n' vale basura entra en el 
        //cuentaNum++ y me incrementa uno de mas
        if($cuentaNum==13){ 
        
                
                $inicial=$_GET['inicial'];
                $final=$_GET['final'];
           
                $numero= explode(" ", $concatena);
                
            //primer tramo
                $auxiliar = $numero[9];
                for ($i = 9; $i > $final; $i--) {
                    $numero[$i] = $numero[$i - 1];
                }
                $numero[$final] = $numero[$inicial];

            // Segundo tramo
                for ($i = $inicial; $i > 0; $i--) {
                     $numero[$i] = $numero[$i - 1];
                }
                $numero[0] = $auxiliar;
                
                for ($i = 0; $i < 10; $i++) {
                    echo $numero[$i],", ";
                
                }
            
        }
            
            
        
        ?>
    </body>
</html>
