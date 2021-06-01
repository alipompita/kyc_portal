<?php
require_once 'loader.php';
class Institution{
    public $id, $registration_number, $name, $isic, $industry, $phone, $email, $address, $location;
    
    public static function addInstitution($registration_number, $name, $isic, $industry, $phone, $email, $address, $location){
        $sql = "insert into institutions (registration_number, name, isic_number, industry, phone, email, address, location) 
                values ('$registration_number', '$name', '$isic', '$industry', '$phone', '$email', '$address', '$location') ";
        execute($sql);
        //echo "<br> $sql <br>";
        $sql = "select id from institutions where registration_number = '$registration_number'";
        $rs = query($sql);
        if ($rs->num_rows > 0) {
            $row = $rs->fetch_array();
            return $row[0];
        }else return -1;  
    }
    
    public function load($id){
        $sql = "select * from institutions where id = '$id'";
        $rs = query($sql);
        if($rs->num_rows == 1){
            $row = $rs->fetch_array();
            $this->id = $row[0];
            $this->registration_number = $row[1];
            $this->name = $row[2];
            $this->isic = $row[3];
            $this->industry = $row[4];
            $this->phone = $row[5];
            $this->email = $row[6];
            $this->address = $row[7];
            $this->location = $row[8];
            return  true;
        }else return false;
    }
    
    public function addUser($type, $nid, $fName, $surname, $email, $phone, $password){
        $userID = $this->id."i".date("ymdis");
        $sql = "insert into users values('$userID', '$type', '".$this->id."', '$nid', '$fName', '$surname', '$email', '$phone', '".md5($password)."')";
        //echo "$sql <br>";
        execute($sql);
    }
    
    public function convertRep(){
        $sql = "select * from representatives where institution = '".$this->id."'";
        $rs = query($sql);
        if($rs->num_rows == 1){
            $row = $rs->fetch_array();
            $type = 2;
            $nid = $row[1];
            $fName = $row[3];
            $surname = $row[4];
            $phone = $row[5];
            $email = $row[6];
            $password = "12345";
            $this->addUser($type, $nid, $fName, $surname, $email, $phone, $password);
        }
    }
    
    
    public function getAllUsers(){
        $sql = "select id from users where institution = '".$this->id."'";
        $users = array();
        $rows = queryArray($sql);
        $i = 0;
        if($rows != null){
            foreach ($rows as $row){
                $user = new User();
                if ($user->load($row[0])){
                    $users[$i] = $user;
                    $i++;
                }
            }
        }
        return $users;
    }
    
    public function getVerifiedScans(){
        $logs = array();
        $sql = "SELECT v.log_code FROM institutions i, users u, verification_log v WHERE i.id = u.institution and u.id = v.user and i.id = '".$this->id."' and v.holder is not null";
        //echo "$sql<br>";
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
    
    public function getInvalidInputs(){
        $logs = array();
        $sql = "SELECT v.log_code FROM institutions i, users u, verification_log v WHERE i.id = u.institution and u.id = v.user and i.id = '".$this->id."' and v.input is not null";
        //echo "$sql<br>";
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
    
}

















