<?php
session_start();
require_once 'classes/db_controller.php';
require_once 'classes/booking.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => false, 'message' => 'User not logged in']);
    exit;
}

$userId = $_SESSION['user_id'];
$dbController = new dbController();
$db = $dbController->getConn();
$booking = new Booking($db);

if ($userId) {
    $bookings = $booking->viewBookings($userId);
} else {
    $bookings = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookingId = $_POST['booking_id'] ?? null;
    $trainer = $_POST['trainer'] ?? '';
    $trainingOption = $_POST['training_option'] ?? '';
    $startDate = $_POST['start_date'] ?? '';
    $endDate = $_POST['end_date'] ?? '';
    $startTime = $_POST['start_time'] ?? '';
    $endTime = $_POST['end_time'] ?? '';
    $ratePerSession = $_POST['rate_per_session'] ?? 0;
    $feedback = $_POST['feedback'] ?? '';

    try {
        $start_datetime = new DateTime($startDate);
        $end_datetime = new DateTime($endDate);
        $interval = $start_datetime->diff($end_datetime);
        $number_of_days = $interval->days + 1; // Added +1 to include both start and end dates
        $totalCost = $number_of_days * $ratePerSession;

        $result = $booking->updateBooking($bookingId, $trainer, $trainingOption, $startDate, $endDate, $startTime, $endTime, $ratePerSession, $totalCost,$feedback);

        if ($result['status']) {
            echo json_encode($result); // Send JSON success response
            exit;
        } else {
            echo json_encode($result); // Send JSON error response
            exit;
        }
    } catch (Exception $e) {
        echo json_encode(['status' => false, 'message' => $e->getMessage()]);
        exit;
    }
}
?>