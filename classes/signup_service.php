<?php 
require_once 'db_controller.php';
class SignupService{
    private $db;

    public function __construct(dbController $dbController)
    {
        $this->db = $dbController->getConn();
    }
    public function userExist($username, $email){
        $stmt = $this->db->prepare("CALL sp_check_user_existence(:username, :email)");
        $stmt->execute(['username'=> $username, 'email'=> $email]);
        return $stmt->fetch();
    }
    public function registerUser($username,$hashedPassword,$email){
        $stmt = $this->db->prepare("CALL sp_register_user(:username, :password, :email)");
        return $stmt->execute(['username'=> $username, 'password'=> $hashedPassword, 'email'=> $email]);
    }
}
?>