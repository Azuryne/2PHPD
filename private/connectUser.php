<?php
require('classes/Database.php');

if (!empty($_POST['email']) && !empty($_POST['password'])){
    $database= new Database('localhost', 'root', '', '2phpd');
    $user = $database->authenticate($_POST['email'], $_POST['password']);
    if($user){
        session_start();
        $_SESSION['user'] = $user;
        header('Location: ../home.php');
    }
    else{
        header('Location: ../connection.php?invalid=password');
    }
    unset($database);
    
}
