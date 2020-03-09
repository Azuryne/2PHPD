<?php
namespace Classes;

    Class  User {
        public $id;
        public $email;
        public $lastname;
        public $firstname;
        public $age;
        public $password;

    
    public function __construct($user){
        $this->id = $user['id'];
        $this->email = $user['email'];
        $this->lastname = $user['lastname'];
        $this->firstname = $user['firstname'];
        $this->age = $user['age'];
        $this->password = $user['password'];
        

    }

}
