<?php 
require_once 'db_controller.php';
class trainerSignupService{
    private $db;
    
    public function __construct(dbController $dbController)
    {
        $this->db = $dbController->getConn();
    }
    public function trainerExist($trainer_username, $trainer_email){
        $stmt = $this->db->prepare("CALL sp_trainer_check_existence(:trainer_username, :trainer_email)");
        $stmt->execute(['trainer_username'=>$trainer_username, 'trainer_email'=>$trainer_email]);
        return $stmt->fetch();
    }
    public function registerTrainer($trainer_username,$trainer_password,$trainer_email,$mobile_num,$status){
        $stmt = $this->db->prepare("CALL sp_register_trainer(:trainer_username, :trainer_password, :trainer_email, :mobile_num, :status)");
        return $stmt->execute(['trainer_username'=>$trainer_username, 'trainer_password'=> $trainer_password, 'trainer_email'=> $trainer_email, 'mobile_num'=>$mobile_num, 'status'=>$status]);
    }
}
?>