<?php
namespace Classes;

class Person {
    public $firstname = 'Pierre';

    public function __construct($firstname){
        $this->firstname = $firstname;
        $this->money = 0;
    }

    public function __clone(){

    }

    public function greetings(){
        return 'Bonjour ' . $this->firstname . '<br/>';
    }

    public function addMoney($money){
        $this->money += $money;
    }

}