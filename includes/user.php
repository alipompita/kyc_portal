<?php
require_once 'loader.php';
class User{
    private $id, $type, $institutionID, $nid_number, $first_name, $surname, $email, $phone;
    
    public function load($id){
        $sql = "select * from users where id = '$id'";
        $rs = query($sql);
        if ($rs->num_rows == 1){
            $row = $rs->fetch_array();
            $this->id = $row[0];
            $this->type = $row[1];
            $this->institutionID = $row[2];
            $this->nid_number = $row[3];
            $this->first_name = $row[4];
            $this->surname = $row[5];
            $this->email = $row[6];
            $this->phone = $row[7];
            return true;
        }else return false;
    }
    
    public function getID(){
        return $this->id;
    }
    
    public function getInstitutionID(){
        return $this->institutionID;
    }
    
    public function getInstitutionName(){
        $inst = new Institution();
        $inst->load($this->institutionID);
        return $inst->name;     
    }
    
    public function netNIDNumber(){
        return $this->nid_number;
    }
    public function getFirstName(){
        return $this->first_name;
    }
    public function setFirstName($name){
        $this->first_name = $name;
    }
    
    public function getSurname(){
        return $this->surname;
    }
    
    public function setSurname($name){
        $this->surname = $name;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getTypeID(){
        return $this->type;
    }
    
    public function getType(){
        if($this->type == 1){
            return "NRB";
        }elseif ($this->type == 2){
            return "Admin";
        }else{
            return "Staff";
        }
    }
    
    public function validPassword($password){
        $sql = "select * from users where id = '".$this->id."' and password = '".md5($password)."'";
        return query($sql)->num_rows == 1;        
    }
    
    public function upDatePassword($password){
        $sql = "update users set password = '".md5($password)."' where id = '".$this->id."'";  
        execute($sql);
    }
    
    public function getPhone(){
        return $this->phone;
    }
    
    public function getFullName(){
        return $this->first_name . " " .$this->surname;
    }
    
    public function login($email, $password){
        $sql = "select id from users where email = '$email' and password = '".md5($password)."'";
        $rs = query($sql);
        if ($rs->num_rows == 1){
            $row = $rs->fetch_array();
            return $this->load($row[0]);
        }else return false;
    }
    
    public function logValid($holderID){
        $code = date("YmdHis");
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $sql = "insert into verification_log values ('$code', '$date', '$time', '".$this->id."', '$holderID', null)";
        execute($sql);
    }
    
    public function logInvalid($input){
        $code = date("YmdHis");
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $sql = "insert into verification_log values ('$code', '$date', '$time', '".$this->id."', null, '$input')";
        execute($sql);
    }
    
    public function getLog($filter){
        $sql = 'select log_code from user';
    }
    
    public function allValidLogs(){
        $logs = array();
        $sql = "select log_code from verification_log where user='".$this->id."' and holder is not null";
        $rows = queryArray($sql);
        $i = 0;
        if($rows != null){
            foreach ($rows as $row){
                $log = new Log();
                if($log->load_valid($row[0])){
                    $logs[$i] = $log;
                    $i++;
                }
            }
        }
        return $logs;
    }
    
    public function filterValidLogs($range){
        $logs = array();
        $sql = "select log_code from verification_log where user='".$this->id."' and holder is not null and date like '%$range%'";
        $rows = queryArray($sql);
        $i = 0;
        if($rows != null){
            foreach ($rows as $row){
                $log = new Log();
                if($log->load_valid($row[0])){
                    $logs[$i] = $log;
                    $i++;
                }
            }
        }
        return $logs;
    }
    
    public function allInvalidLogs(){
        $logs = array();
        $sql = "select log_code from verification_log where user='".$this->id."' and input is not null";
        $rows = queryArray($sql);
        $i = 0;
        if ($rows != null){
            foreach ($rows as $row){
                $log = new Log();
                if($log->load_invalid($row[0])){
                    $logs[$i] = $log;
                    $i++;
                }
            }
        }
        return $logs;
    }
    
    public function filterInValidLogs($range){
        $logs = array();
        $sql = "select log_code from verification_log where user='".$this->id."' and input is not null and date like '%$range%'";
        //echo "$sql <br>";
        $rows = queryArray($sql);
        $i = 0;
        if($rows != null){
            foreach ($rows as $row){
                $log = new Log();
                if($log->load_invalid($row[0])){
                    $logs[$i] = $log;
                    $i++;
                }
            }
        }
        return $logs;
    }
    
    public function getScanCount(){
        $sql = "select log_code from verification_log where user = '".$this->id."'";
        return query($sql)->num_rows;
    }
    
    public function getVerificationCount(){
        $sql = "select log_code from verification_log where user = '".$this->id."' and holder is not null";
        return query($sql)->num_rows;
    }
    
    
    
    
    
    
    
}