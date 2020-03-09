<?php
use Classes\Database;

$error = ['error' => []];
header('Content-Type: application/json');
if (empty($_POST)){
    $_POST = json_decode(file_get_contents('php://input'), true);
}

if (!empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && 
!empty($_POST['age']) && !empty($_POST['password']) && !empty($_POST['repeatPassword'])){
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];
    if (!(strpos($email, '@') && strpos($email, '.'))){
        array_push($error['error'], 'email');
    }
    if (!(intval($age) && intval($age) >= 12 && intval($age) <= 150)){
        array_push($error['error'], 'age');
    }
    if(!($password === $repeatPassword)){
        array_push($error['error'], 'password');
    }
    if (empty($error['error'])){
        $hashedpwd = password_hash($password, PASSWORD_BCRYPT);
        $database = new Database('localhost', 'root', '', '2phpd');
        $result = $database->add_user($email, $firstname, $lastname, $age, $hashedpwd);
        if($result){
            http_response_code(201);
            echo json_encode($error);
        }
    }
    else{
        http_response_code(400);
        echo json_encode($error);
    }
}
else{
    http_response_code(400);
    array_push($error['error'], 'Missing inputs');
    echo json_encode($error);
}
