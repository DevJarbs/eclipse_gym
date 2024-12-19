<?php 
session_start();
require_once 'controllers/trainer_controller.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $trainer_username = $_POST['trainer_username'];
  $trainer_password = $_POST['trainer_password'];

  $trainer_controller = new trainerLogInController();
  $result = $trainer_controller->authenticateTrainer($trainer_username,$trainer_password);

  header('Content-Type: application/json');
  echo json_encode($result);
  exit;
}