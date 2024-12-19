<?php 
require_once 'classes/db_controller.php';
class trainerLogInController{
    private $db;

    public function __construct()
    {
        $this->db = new dbController();
    }

    public function authenticateTrainer($trainer_username, $trainer_password){
        $pdo = $this->db->getConn();
        $stmt = $pdo->prepare("CALL sp_trainer_login(:trainer_username)");
        $stmt->bindParam('trainer_username', $trainer_username, PDO::PARAM_STR);
        $stmt->execute();
        $trainer = $stmt->fetch(PDO::FETCH_ASSOC);

        if($trainer){
            if(password_verify($trainer_password, $trainer['trainer_password'])){
                if($trainer['status'] === 'approved'){
                    $_SESSION['trainer_id'] = $trainer['trainer_id'];
                    return ['status' => true, 'message' => 'Logged in successfully'];
                }else if($trainer['status'] === 'rejected'){
                    return ['status' => false, 'message' => 'Application for trainer rejected.'];
                }else{
                    return ['status' => false, 'message' => 'Your account is pending approval by the admin.'];
                }
            }else{
                return ['status' => false, 'message' => 'Incorrect Password.'];
            }
        }
        return ['status' => false, 'message' => 'Username not found.'];
    }
}
?>