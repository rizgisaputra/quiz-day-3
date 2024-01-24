<?php
include "CodeWifi.php";

class Food {
    private  string $name;
    private int $price;
    private int $stok;


    public function setName(string $name) {
        $this->name = $name;
    }
    public function setPrice(int $price) {
        $this->price = $price;
    }
    public function setStok(int $stok) {
        $this->stok = $stok;
    }

    public function getName() {
        return $this->name;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getStok() {
        return $this->stok;
    }
};