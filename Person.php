<?php

class Person {
    private string $name;
    private string $nomor_id;
    private int $age;

    public function setName(string $name) {
        $this->name = $name;
    }
    public function setNomorId(string $id) {
        $this->nomor_id = $id;
    }
    public function setAge(int $age) {
        $this->age = $age;
    }

    public function getName() {
        return $this->name;
    }
    public function getNomorId() {
        return $this->nomor_id;
    }
    public function getAge() {
        return $this->age;
    }
}