<?php

$productos=array(
                "Acer"=>array("nombre"=>"Acer Aspire","precio"=>550, "imagen"=>"Acer_Aspire.png",
                               "detalle"=>"El Acer Aspire One, como ya hemos visto, llega con los <br>"
                    . "nuevos procesadores Intel Atom. Concretamente es el procesador Atom N270 <br>"
                    . "(1.60 GHz, 533 MHz FSB, 512 KB L2 cache). Le acompaña una módulo de memoria <br>"
                    . "RAM de 512 MB DDR2 533 MHz, que podemos ampliar con un módulo extra de 512 MB/1 GB soDIMM."),
            
                "lenovo"=>array("nombre"=>"Lenovo g500","precio"=>750, "imagen"=>"lenovo_g550.jpg",
                    "detalle"=>"Cuenta con una pantalla brillante de 15,6 pulgadas (39.6 cm) con retroiluminación LED <br>
                        y una resolución nativa de 1366 x 768 píxeles, una calidad de imagen satisfactoria en ámbitos <br>
                        generales.Uno de los mayores atractivos de este portátil es su procesador de tercera generación <br>
                        y cuatro núcleos i7 3632QM (Ivy Bridge-MB) a una velocidad de 2.2 GHz (3.2 GHz de frecuencia turbo 
                        máxima)."),
            
                "sony"=>array("nombre"=>"Sony Vaio","precio"=>620, "imagen"=>"portatil-sony.jpg",
                    "detalle"=>"El Sony Vaio SVE1512R1EW es un portátil con procesador de doble núcleo Intel® Core™ i5-3210M, <br>"
                    . "6 GB de RAM y un amplio disco duro de 640 GB. Además, ofrece 1 GB de memoria gráfica dedicada gracias a <br>"
                    . "su tarjeta AMD Radeon™ HD 7650M."),
            
                "apple"=>array("nombre"=>"Apple macbook air","precio"=>980, "imagen"=>"portatil_apple_macbook_air.jpg",
                    "detalle"=>"Pantalla retroiluminada por LED de 11.6 pulgadas (1.366 x 768) ó 13.3 pulgadas (1.440 x 900)<br>
                    Integrada Intel HD 6000 con 1536 MiB de RAM reservados. Soporta un monitor externo con resolución de hasta 2.560<br> por 1.600 píxeles
                    Almacenamiento en flash desde 128 GB hasta 512 GB.
                    Core i5 de Intel de doble núcleo a 1,6 GHz (Turbo Boost de hasta 2,7 GHz) con 3 MB de caché de nivel 3 compartida<br>
                    Opción de configuración con Core i7 de Intel de doble núcleo a 2,2 GHz (Turbo Boost de hasta 3,2 GHz) y 4 MB de caché de nivel 3 compartida"),
            
                "samsung"=>array("nombre"=>"Samsung serie 9","precio"=>615, "imagen"=>"samsung_series_9.jpg",
                    "detalle"=>"El portátil Samsung Serie 9 es uno de los más ligeros y delgados disponibles. Su diseño exterior "
                    . "robusto cuenta con una superficie de aluminio elegante y una cubierta duradera. Su potente procesador Intel® Core"
                    . " ofrece un manejor optimizado para una gran variedad de tareas IT. Su unidad SSD ofrece un bajo consumo a la vez que"
                    . " mejora el rendimiento. La unidad SSD es hasta un 60% más rápido que los discos duros estándar, por lo que reduce su "
                    . "potencia y acelera el acceso a los datos.."),
            );


    foreach ($productos as $codigo => $elemento) {
            setcookie($codigo, serialize($elemento), time() + 365 * 24 * 3600);
          }

          
/*
Serialize data:

setcookie('cookie', serialize($info), time()+3600);
 * 
Then unserialize data:

$data = unserialize($_COOKIE['cookie']);
 * 
After data, $info and $data will have the same content.
 */
 
?>
