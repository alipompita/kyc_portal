<?php
require_once 'loader.php';
class Holder{
    public $id, $surname, $first_name, $sex, $dob, $issueDate, $expiryDate,$nationality;
    
    public function load($id){
        $sql = "select * from holders where id = '$id'";
        $rs = query($sql);
        if ($rs->num_rows == 1){
            $row = $rs->fetch_array();
            $this->id = $row[0];
            $this->surname = $row[1];
            $this->first_name = $row[2];
            $this->sex = $row[3];
            $this->dob = $row[4];
            $this->issueDate = $row[5];
            $this->expiryDate = $row[6];
            $this->nationality = $row[7];
            return true;
        }else return false;
    }
    
    public static function verify($id, $userID){
        $holder = new Holder();
        $user = new User();
        $user->load($userID);
        if ($holder->load($id)){
            $user->logValid($id);
            return $holder;
        }else{
            $user->logInvalid($id);
            return null;
        }
    }
}