<?php
include "Food.php";
include "Person.php";

class Customer extends Person {
    
    private string $keperluan;
    private string $addres;
    private int $total_pay;
    
    public function setKeperluan(string $keperluan) {
        $this->keperluan = $keperluan;
    }
    public function setAddres(string $addres) {
        $this->addres = $addres;
    }
    public function setTotalPay(int $total_pay) {
        $this->total_pay = $total_pay;
    }
    
    public function getKeperluan() {
        return $this->keperluan;
    }
    public function getAddres() {
        return $this->addres;
    }
    public function getTotalPay() {
        return $this->total_pay;
    }
    };