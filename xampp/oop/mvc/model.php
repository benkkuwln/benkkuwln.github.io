<?php

class Kayttaja {
    // jäsenmuuttujat
    private $kayttajaid;
    private $etunimi;
    private $sukunimi;
    // metodit
    // alustaja
    public function __construct($kayttajaid = NULL, $etunimi ="", $sukunimi ="") {
        $this->kayttajaid = $kayttajaid;
        $this->etunimi = $etunimi;
        $this->sukunimi = $sukunimi;
    }
    public function getKayttajaid() {
        return $this->kayttajaid;
    }
    public function setKayttajaid($uusi_id) {
        $this->kayttajaid = $uusi_id;
    }
    public function getEtunimi() {
        return $this->etunimi;
    }
    public function setEtunimi($uusi_etunimi) {
        $this->etunimi = $uusi_etunimi;
    }
    public function getSukunimi() {
        return $this->sukunimi;
    }
    public function setSukunimi($uusi_sukunimi) {
        $this->etunimi = $uusi_sukunimi;
    }
}

?>