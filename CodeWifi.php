<?php

class CodeWifi {
    private string $kode_wifi_2k;
    private string $kode_wifi_5k;
    private string $kode_wifi_10k;
    
    public function setCodeWifi2k(string $kode_wifi_2k) {
        $this->kode_wifi_2k = $kode_wifi_2k;
    }
    public function setCodeWifi5k(string $kode_wifi_5k) {
        $this->kode_wifi_5k = $kode_wifi_5k;
    }
    public function setCodeWifi10k(string $kode_wifi_10k) {
        $this->kode_wifi_10k = $kode_wifi_10k;
    }
    
    public function getCodeWifi2k() {
        return $this->kode_wifi_2k;
    }
    public function getCodeWifi5k() {
        return $this->kode_wifi_5k;
    }
    public function getCodeWifi10k() {
        return $this->kode_wifi_10k;
    }
};