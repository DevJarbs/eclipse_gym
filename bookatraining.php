<?php
session_start();
header('Content-Type: application/json');

// Initialize database connection and Booking object *ONCE* outside the conditional
require_once 'classes/db_controller.php';
require_once 'classes/booking.php';

if (!isset($_SESSION['user_id'])) {
    $response = ['status' => false, 'message' => 'User not logged in'];
    echo json_encode($response);
    exit;
}

$user_id = $_SESSION['user_id'];
$dbController = new dbController();
$db = $dbController->getConn();
$booking = new Booking($db); // Correct: Pass the PDO object directly

$response = ['status' => false, 'message' => 'Invalid Request']; // Default response

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trainer = $_POST['trainer'] ?? '';
    $training_option = $_POST['training_option'] ?? '';
    $start_date = $_POST['start_date'] ?? '';
    $end_date = $_POST['end_date'] ?? '';
    $start_time = $_POST['start_time'] ?? '';
    $end_time = $_POST['end_time'] ?? '';
    $rate = $_POST['rate_per_session'] ?? 0;

    try {
        $start_datetime = new DateTime($start_date);
        $end_datetime = new DateTime($end_date);
        $interval = $start_datetime->diff($end_datetime);
        $number_of_days = $interval->days + 1; // Important: Add 1 to include both start and end dates
        $total_cost = $number_of_days * $rate;

        $result = $booking->bookTraining($trainer, $training_option, $start_date, $end_date, $start_time, $end_time, $rate, $total_cost, $user_id);
        $response = $result; // Assign the result to the response variable

    } catch (Exception $e) {
        $response = ['status' => false, 'message' => 'Error: ' . $e->getMessage()];
    }
}

echo json_encode($response);
?>