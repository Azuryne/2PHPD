<?php
class Person {
    public $firstname = 'Pierre';
    public static $total = 0;

    public function __construct($firstname){
        $this->firstname = $firstname;
        self::$total +=  1;
    }

    public function __destruct(){
        self::$total --;
    }
    public function __clone(){

    }

    public function greetings(){
        return 'Bonjour ' . $this->firstname . '<br/>';
    }
}

class Man extends Person {
    public $sexe = 'Masculin';

    public function greetings(){
        return 'Bonjour Monsieur ' . $this->firstname . '<br/>';
    }
}

$user = new Person('Ferdinand');
$user2 = clone $user;
echo $user->greetings();
$man = new Man('Emmanuel');
echo $man->sexe . '<br/>';
echo $user->greetings();
echo Person::$total . '<br/>';
unset($user);
echo Person::$total;