<?php
require_once 'classes/db_controller.php';

class Trainer{
    private $conn;

    public function __construct(){
        $dbController = new dbController();
        $this->conn = $dbController->getConn();
    }
    public function fetchPendingTrainers(){
        try{
            $stmt = $this->conn->prepare("CALL sp_trainer_status(:status)");
            $status = 'pending';
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    public function approveTrainer($trainerId){
        $this->updateTrainerStatus($trainerId, 'approved');
    }

    public function rejectTrainer($trainerId){
        $this->updateTrainerStatus($trainerId, 'rejected');
    }
    private function updateTrainerStatus($trainerId, $newStatus){
        try{
            $stmt = $this->conn->prepare("CALL update_trainer_status(:trainer_id, :new_status)");
            $stmt->bindParam(':trainer_id', $trainerId, PDO::PARAM_INT);
            $stmt->bindParam(':new_status', $newStatus, PDO::PARAM_STR);

            $stmt->execute();
        }catch (PDOException $e){
            echo "Error: " . $e->getMessage();
            exit;
        }
    }
}
?>
