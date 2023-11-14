<?php

    if(isset($_POST['submit'])){
        $verollinen_hinta = $_POST['verollinen_hinta'];
        $verokanta = $_POST['verokanta'];

        $veroton_hinta = $verollinen_hinta / (1 + ($verokanta/100));
        $vero = $verollinen_hinta - $veroton_hinta;

        echo "Hinta: $verollinen_hinta<br>";
        echo "Verokanta: $verokanta<br>";
        echo "Veroton hinta: $veroton_hinta<br>";
        echo "Vero: $vero<br>";
    }

?>