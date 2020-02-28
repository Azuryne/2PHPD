<?php
include('databaseFunc.php');

if (!empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && 
!empty($_POST['age']) && !empty($_POST['password']) && !empty($_POST['repeatPassword'])){
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];
    if (strpos($email, '@') && strpos($email, '.')){
        if (intval($age) && intval($age) >= 12 && intval($age) <= 150){
            if($password === $repeatPassword){
                $hashedpwd = password_hash($password, PASSWORD_BCRYPT);
                if(add_user($email, $firstname, $lastname, $age, $hashedpwd)){
                    header('Location: /forum/connection.php?email=' .$email);
                }
                else{
                    header('Location: /forum/register.php?error=database');
                }
            }
            else{
                header('Location: /forum/register.php?error=password');
            }
        }
        else{
            header('Location: /forum/register.php?error=age');
        }
    }
    else{
        header('Location: /forum/register.php?error=email');
    }
}
else{
    header('Location: /forum/register.php?error=empty');
}
