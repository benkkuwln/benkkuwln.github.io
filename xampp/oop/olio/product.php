<?php

class Product {
     

    // konstruktoi luokan parametreina

     function __construct($nimi, $valmistaja, $hinta, $kuvaus) {
        $this->nimi = $nimi;
        $this->valmistaja = $valmistaja;
        $this->hinta = $hinta;
        $this->kuvaus = $kuvaus;
    }
    
    function get_nimi() {
        return $this->nimi;
    }

    function get_valmistaja() {
        return $this->valmistaja;
    }
    
    function get_hinta() {
       return $this->hinta;
    }

    function get_alvhinta($alvprosentti) {
        return $this->hinta * (1 + $alvprosentti / 100);
    }

    function get_kuvaus() {
        return $this->kuvaus;
    }
}


?>