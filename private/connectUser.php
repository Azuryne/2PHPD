<?php
require('databaseFunc.php');

if (!empty($_POST['email']) && !empty($_POST['password'])){
    $user = authenticate($_POST['email'], $_POST['password']);
    if($user){
        $_SESSION['user'] = $user;
        header('Location: /forum/home.php');
    }
}