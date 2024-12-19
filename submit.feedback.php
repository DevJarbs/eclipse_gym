<?php
session_start();
require_once 'classes/db_controller.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $db = new dbController();
        $conn = $db->getConn();

        $booking_id = $_POST['booking_id'];
        $rating = $_POST['rating'];
        $comment = $_POST['comment'];

        $stmt = $conn->prepare("INSERT INTO feedback (booking_id, rating, comment) VALUES (:booking_id, :rating, :comment)");
        $stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);
        $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Feedback submitted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error submitting feedback']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}

