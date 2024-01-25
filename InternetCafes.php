<?php
include "Employement.php";

class InternetCafes extends Customer {
    private $employements = array();
    private $customers = array();
    private $code_wifies = array();
    private $foods = array();
    private int $total_pc_in_reguler_room = 0;
    private int $total_pc_in_vip_room = 0;

    private Employement $employement;
    private Customer $customer;
    private CodeWifi $code_wifi;
    private Food $food;
    
    public function setEmployement(Employement $employement) {
        $this->employements[] = $employement;
    }
    public function setCustomer(Customer $customer) {
        $this->customers[] = $customer;
    }
    public function setCodeWifi(CodeWifi $code_wifi) {
        $this->code_wifies[] = $code_wifi;
    }
    public function setFood(Food $food) {
        $this->foods[] = $food;
    }
    public function setTotalPcInRegulerRoom(int $reguler_room_pc) {
        $this->total_pc_in_reguler_room = $reguler_room_pc;
    }
    public function setTotalPcInVipRoom(int $vip_room_pc) {
        $this->total_pc_in_vip_room = $vip_room_pc;
    }


    public function getEmployement() {
        return $this->employements;
    }
    public function getCodeWifi() {
        return $this->code_wifies;
    }
    public function getCustomer() {
        return $this->customers ;
    }
    public function getFood() {
        return $this->foods;
    }
    public function getTotalPcInRegulerRoom() {
        return $this->total_pc_in_reguler_room;
    }
    public function getTotalPcInVipRoom() {
        return $this->total_pc_in_vip_room;
    }
    };
    