<?php
require_once 'db_controller.php';

class BookedClients{
    private $conn;

    public function __construct() {
        $dbController = new dbController();
        $this->conn = $dbController->getConn();
    }

    public function viewClient($trainer_id) { // Filter by trainer ID
        try {
            $query = "CALL sp_client_status(:trainer_id)"; // Call the stored procedure
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':trainer_id', $trainer_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error in viewClient: " . $e->getMessage()); // Log the error
            return [];
        }
    }

    public function update_client_status($booking_id, $newStatus) {
        try {
            $stmt = $this->conn->prepare("CALL update_client_status(:booking_id, :new_status)");
            $stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);
            $stmt->bindParam(':new_status', $newStatus, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log("Error in update_client_status: " . $e->getMessage());
            return false;
        }
    }

    public function approveClient($booking_id) {
        return $this->update_client_status($booking_id, 'approved');
    }

    public function rejectClient($booking_id) {
        return $this->update_client_status($booking_id, 'rejected');
    }
}
?>