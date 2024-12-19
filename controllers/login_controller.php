<?php 
require_once 'classes/db_controller.php';
class logInController{
    private $db;

    public function __construct()
    {
        $this->db = new dbController();
    }

    public function authenticateUser($username, $password){
        $pdo = $this->db->getConn();
        $stmt = $pdo->prepare("CALL sp_login(:username)");
        $stmt->bindParam('username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user){
            if(password_verify($password, $user['password'])){
                $_SESSION['user_id'] = $user['user_id'];
                return ['status' => true, 'message' => 'Logged in successfully.'];
            }else{
                return ['status' => false, 'message' => 'Incorrect Password.'];
            }
        }
        return ['status' => false, 'message'=> 'Username not Found.'];
    }
}

?>