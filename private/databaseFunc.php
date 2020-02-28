<?php

function add_user($email, $firstname, $lastname, $age, $password){
    $conn = new mysqli('localhost', 'root', '', '2phpd');
    if ($conn->connect_error) {
        return False;
    }
    $stmt = $conn->prepare('INSERT INTO users (email, firstname, lastname, age, password) VALUES (?, ?, ?, ?, ?);');
    $stmt->bind_param("sssis", $email, $firstname, $lastname, $age, $password);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function authenticate($email, $password){
    $conn = new mysqli('localhost', 'root', '', '2phpd');
    if ($conn->connect_error) {
        return False;
    }
    $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?;');
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
        return $user;
    }
    return False;
    
}


