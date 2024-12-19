<?php
session_start();
require_once "controllers/login_controller.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
     $username = $_POST['username'];
     $password = $_POST['password'];

    $loginController = new logInController();
    $result = $loginController->authenticateUser($username,$password);
    
        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
}
?>

 

  