<?php 
session_start();
require_once 'classes/db_controller.php';
require_once 'classes/trainer_signup_service.php';

$response = ['status'=> false, 'message' =>''];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $trainer_username = $_POST['trainer_username'] ?? '';
    $trainer_password = $_POST['trainer_password'] ?? '';
    $trainer_confirmpass = $_POST['trainer_confirmpass'] ?? '';
    $trainer_email = $_POST['trainer_email'] ?? '';
    $mobile_num = $_POST['mobile_num'] ?? '';
    
    if($trainer_password !== $trainer_confirmpass){
        $response['message'] = 'Passwords does not match';
    }else{
        try{
            $conn = new dbController();
            $trainerSignUpService = new trainerSignupService($conn);

            $existingTrainer = $trainerSignUpService->trainerExist($trainer_username, $trainer_email);

            if($existingTrainer){
                $response['message'] = $existingTrainer['trainer_username'] === $trainer_username
                ? 'Username already in use!' : 'Email already exists';
            }else{
                $hashedPassword = password_hash($trainer_password, PASSWORD_DEFAULT);
                $trainerRegistered = $trainerSignUpService->registerTrainer($trainer_username,$hashedPassword,$trainer_email,$mobile_num,'pending');
                 
                if($trainerRegistered){
                    $response['status'] = true;
                    $response['message'] = 'Pending admin approval';
                }else{
                    $response['message'] = 'Failed to register. Please try again';
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