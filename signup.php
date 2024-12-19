<?php
session_start();
require_once 'classes/db_controller.php';
require_once 'classes/signup_service.php';

$response = ['status' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmpass = $_POST['confirmpass'] ?? '';

    if($password !== $confirmpass){
        $response['message'] = 'Passwords do not match!';
    } else {
        try {
            $conn = new dbController();
            $signUpService = new SignupService($conn);

            $existingUser = $signUpService->userExist($username, $email);

            if ($existingUser){
                $response['message'] = $existingUser['username'] === $username
                    ? 'Username already exists!'
                    : 'Email already exists!';
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $registered = $signUpService->registerUser($username, $hashedPassword, $email);

                if ($registered) {
                    $response['status'] = true;
                    $response['message'] = 'Account successfully registered!';
                } else {
                    $response['message'] = 'Failed to register. Please try again.';
                }
            }
        }catch(PDOException $e){
            $response['message'] = addslashes($e->getMessage());
        }
    }
}

header('Content-Type: application/json');
echo json_encode($response);
exit;
?>
