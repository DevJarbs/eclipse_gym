<?php
class Database{
    protected $conn;
    protected $errMsg;
    protected $state;
    
    public function __construct()
    {
        $config = require_once "config/config.php";
        try{
            $dsn = "mysql:host={$config['db_host']};dbname={$config['db_name']};charset={$config['charset']}";
            $this->conn = new PDO($dsn, $config['db_username'], $config['db_password']);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->errMsg = "Connected";
            $this->state = true;
        }catch(PDOException $e){
            $this->state = false;
            $this->errMsg = "Failed to connect into database: ". $e->getMessage();
        }
    }
    protected function getConn(){
        return $this->conn;
    }
    protected function getErrMsg(){
        return $this->errMsg;
    }
    protected function getState(){
        return $this->state;
    }
}
?>