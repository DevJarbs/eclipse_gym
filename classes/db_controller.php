<?php
require_once 'database.php';

class dbController extends Database{
    public function __construct()
    {
        parent::__construct();
    }

    public function getConn(){
        return parent::getConn();
    }
    public function getErrMsg(){
        return parent::getErrMsg();
    }
    public function getState(){
        return parent::getState();
    }
}

?>
