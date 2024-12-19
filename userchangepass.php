<?php 
session_start();
require_once 'classes/user_cpass.php';
require_once 'classes/db_controller.php';

$db = new dbController();
$user = new UserChangePassword($db);
$response = ['status' => false, 'message' => 'Invalid Request'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_id = $_SESSION['user_id'];
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];    

    if ($newPassword !== $confirmPassword) {
        $response['message'] = "Passwords don't match.";
    }else{
        $result = $user->changeUserPass($user_id,$newPassword);
        $response = $result;
    }
    
}
header('Content-Type: application/json');
echo json_encode($response);
exit;
?>