<?php
require_once 'db_controller.php'; 
class UserChangePassword{
      private $db;

      public function __construct(dbController $dbController)
      {
        $this->db = $dbController->getConn();
      }
      public function changeUserPass($user_id, $newPassword){
        try{
          
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("CALL user_changepass(:user_id, :new_password)");
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindValue(':new_password', $hashedPassword, PDO::PARAM_STR);
            $stmt->execute();

            return ['status' => true, 'message' => 'Password change successfully.'];
        }catch(PDOException $e){
            return ['status' => false, 'message'=>'An error occured while changing password'];
        }
      }
}
?>