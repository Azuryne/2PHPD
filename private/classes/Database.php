<?php
namespace Classes;

use mysqli;

class Database {
public $connection;

public function __construct($address = 'localhost:8889', $username='root', $password='root', $database='2phpd'){
    $this->connection = new mysqli ($address, $username, $password, $database);
    }
public function __destruct(){
    $this->connection->close();

}

public function authenticate($email, $password){
    $this->connection;
    if ($this->connection->connect_error) {
        return False;
    }
    $stmt = $this->connection->prepare('SELECT * FROM users WHERE email = ?;');
    $stmt->bind_param("s", $email);
    $result = $stmt->execute();
    if(!$result){
        return False;
    }
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if(empty($user)){
        return False;
    }
    $same = password_verify($password, $user['password']);
    if($same){
        $user1 = new User($user);
        return $user1;
    }
    return False;
    }

    function add_user($email, $firstname, $lastname, $age, $password){
        if ($this->connection->connect_error) {
            return False;
        }
        $stmt = $this->connection->prepare('INSERT INTO users (email, firstname, lastname, age, password) VALUES (?, ?, ?, ?, ?);');
        $stmt->bind_param("sssis", $email, $firstname, $lastname, $age, $password);
        $result = $stmt->execute();
        $stmt->close();
        $this->connection;
        return $result;
    }
}

