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
        $mesIntro=$_GET[mes];
        $diaIntro=$_GET[dia];
        
        switch($mesIntro) {
            case "enero":
                if(($diaIntro>=1)&&($diaIntro<=19)){
                    
                    echo"Usted es Capricornio";
                    
                }else if(($diaIntro>19)&&($diaIntro<=31)){
                    
                    echo"Usted es Acuario";
                }
            break;
            case "febrero":
                if(($diaIntro>=1)&&($diaIntro<=18)){
                    
                    echo"Usted es Acuario";
                    
                }else if(($diaIntro>18)&&($diaIntro<=27)){
                    
                    echo"Usted es Piscis";
                }
            break;
            case "Marzo":
                if(($diaIntro>=1)&&($diaIntro<=20)){
                    
                    echo"Usted es Piscis";
                    
                }else if(($diaIntro>20)&&($diaIntro<=31)){
                    
                    echo"Usted es Aries";
                }
            break;
            case "Abril":
                if(($diaIntro>=1)&&($diaIntro<=20)){
                    
                    echo"Usted es Aries";
                    
                }else if(($diaIntro>20)&&($diaIntro<=30)){
                    
                    echo"Usted es Tauro";
                }
            break;
            case "Mayo":
                if(($diaIntro>=1)&&($diaIntro<=20)){
                    
                    echo"Usted es Tauro";
                    
                }else if(($diaIntro>20)&&($diaIntro<=31)){
                    
                    echo"Usted es Geminis";
                }
            break;
            case "Junio":
                if(($diaIntro>=1)&&($diaIntro<=20)){
                    
                    echo"Usted es Geminis";
                    
                }else if(($diaIntro>20)&&($diaIntro<=31)){
                    
                    echo"Usted es Cancer";
                }
            break;
            case "Julio":
                if(($diaIntro>=1)&&($diaIntro<=21)){
                    
                    echo"Usted es Cancer";
                    
                }else if(($diaIntro>21)&&($diaIntro<=31)){
                    
                    echo"Usted es leo";
                }
            break;
            case "Agosto":
                if(($diaIntro>=1)&&($diaIntro<=21)){
                    
                    echo"Usted es Leo";
                    
                }else if(($diaIntro>21)&&($diaIntro<=27)){
                    
                    echo"Usted es Virgo";
                }
            break;
            case "Septiembre":
                if(($diaIntro>=1)&&($diaIntro<=22)){
                    
                    echo"Usted es Virgo";
                    
                }else if(($diaIntro>22)&&($diaIntro<=30)){
                    
                    echo"Usted es Libra";
                }
            break;
            case "Octubre":
                if(($diaIntro>=1)&&($diaIntro<=23)){
                    
                    echo"Usted es Libra";
                    
                }else if(($diaIntro>23)&&($diaIntro<=31)){
                    
                    echo"Usted es Escorpio";
                }
            break;
            case "Noviembre":
                if(($diaIntro>=1)&&($diaIntro<=22)){
                    
                    echo"Usted es Escorpio";
                    
                }else if(($diaIntro>22)&&($diaIntro<=27)){
                    
                    echo"Usted es Sagitario";
                }
            break;
            case "diciembre":
                if(($diaIntro>=1)&&($diaIntro<=20)){
                    
                    echo"Usted es Sagitario";
                    
                }else if(($diaIntro>20)&&($diaIntro<=27)){
                    
                    echo"Usted es Piscis";
                }
            break;
            
        }
        
        ?>
    </body>
</html>
