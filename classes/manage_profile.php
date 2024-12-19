<?php
require_once 'db_controller.php';

class ManageProfile {
    private $db;

    public function __construct(dbController $dbController) {
        $this->db = $dbController->getConn();
    }
    public function updateProfile($user_id, $name, $age, $contact_num, $email) {
        try {
            $stmt = $this->db->prepare("CALL update_user_profile(:user_id, :name, :age, :contact_num, :email)");
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':age', $age, PDO::PARAM_INT);
            $stmt->bindParam(':contact_num', $contact_num, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            return ['status' => true, 'message' => 'Profile updated successfully.'];
        } catch (PDOException $e) {
            return ['status' => false, 'message' => 'An error occurred while updating the profile.'];
        }
    }
}
?>