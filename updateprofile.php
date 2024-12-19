<?php
session_start();
require_once 'classes/db_controller.php';
require_once 'classes/manage_profile.php';
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => false, 'message' => 'User not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];
$db = new dbController();
$profileManager = new ManageProfile($db);

$response = ['status' => false, 'message' => 'Invalid Request'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $contact_num = $_POST['contact_num'];
    $email = $_POST['email'];
    $response = $profileManager->updateProfile($user_id, $name, $age, $contact_num, $email);
}
$stmt = $db->getConn()->prepare("SELECT * FROM user_profile_view WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$userinfo = $stmt->fetch(PDO::FETCH_ASSOC);
?>