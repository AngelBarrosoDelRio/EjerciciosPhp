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
        include_once 'Perro.php';
        include_once 'Gato.php';
        include_once 'Canario.php';
        include_once 'Pinguino.php';
        include_once 'Serpiente.php';

        $keny = new Perro("macho");
        $nala = new Perro("hembra", "pastor aleman");
        $garfield = new Gato("hembra", "persa");
        $pichi = new Canario();
        $pingu = new Pinguino("macho", "fraile");
        $sanake = new Serpiente();


        echo "Keny:" . $keny->come("caca") . "<br>";
        echo "Keny:" . $keny->dameLaPatita() . "<br>";
        echo "Keny:" . $keny->getSexo() . "<br>";
        echo "nala:" . $nala->getSexo() . "<br>";
        echo "Keny:" . $keny->getRaza() . "<br>";
        echo "nala:" . $nala->getRaza() . "<br>";
        echo "Keny:" . $keny->mama() . "<br>";
        echo "nala:" . $nala->mama() . "<br>";

        echo "garfield:" . $garfield->mama() . "<br>";
        echo "garfield:" . $garfield->come("sal") . "<br>";
        echo "pichi:" . $pichi->vuela() . "<br>";
        echo "pingu:" . $pingu->vuela() . "<br>";

        echo "Snake: " . $sanake->seEsconde() . "<br>";
        ?>
    </body>
</html>
