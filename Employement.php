<?php
include "Customer.php";

class Employement extends Person{
    private int $total_absen;
    private int $total_gaji;

    
    public function setTotalAbsen(int $absen) {
        $this->total_absen = $absen;
    }
    public function setTotalGaji(int $gaji) {
        $this->total_gaji = $gaji;
    }
    
    public function getTotalAbsen() {
        return $this->total_absen;
    }
    public function getTotalGaji() {
        return $this->total_gaji;
    }
    };
