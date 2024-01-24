<?php
include "InternetCafes.php";

class Bussines {
    private $internet_cafes = array();
    private int $omzet = 0;
    
    private InternetCafes $internet_cafess;

    public function setInternetCafes(InternetCafes $internet_cafess) {
        $this->internet_cafes[] = $internet_cafess;
    }
    public function setOmzet(int $omzett) {
        $this->omzet = $omzett;
    }

    public function getInternetCafes() {
        return $this->internet_cafes;
    }
    public function getOmzet() {
        return $this->omzet;
    }
    };
    