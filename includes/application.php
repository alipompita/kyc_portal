<?php
include_once 'loader.php';
class Application{
    public $id, $instID, $status;
    
    public function load($id){
        $sql = "select * from applications where id = '$id'";
        $rs = query($sql);
        if($rs->num_rows){
            $row = $rs->fetch_array();
            $this->id = $row[0];
            $this->instID = $row[1];
            $this->status = $row[2];
            return true;
        }else return false;
    }
    
    public function getInstitution(){
        $inst =  new Institution();
        $inst->load($this->instID);
        return $inst;
    }
    
    public function accept(){
        $this->getInstitution()->convertRep();
        $sql = "update applications set status = 'Accepted' where id = '".$this->id."'";
        execute($sql);
    }
    
    public function reject(){
        $sql = "update applications set status = 'Rejected' where id = '".$this->id."'";
        execute($sql);
    }
    
    
    public static function newApplication($company_name, $reg_number, $isic, $industry, $company_email, $company_phone, $address, $location, $first_name, $id_number, $surname, $email, $phone){
        echo "application form";
        $instID = Institution::addInstitution($reg_number, $company_name, $isic, $industry, $company_phone, $company_email, $address, $location);
        $applicationID = date("Ymdis");
        $sql = "insert into applications values ('$applicationID', '$instID', 'Pending')";
        execute($sql);
        $sql = "insert into representatives (NID_number, institution, first_name, surname, phone, email) values ('$id_number', '$instID', '$first_name', '$surname', '$phone', '$email')";
        execute($sql);      
    }
    
    private static function applicationsList($rows){
        $applications = array();
        $i = 0;
        foreach ($rows as $row){
            $application = new Application();
            if ($application->load($row[0])) {
                $applications[$i] = $application;
                $i++;
            }
        }return $applications;
    }
    
    public static function pendingApplications(){
        $sql =  "select id from applications where status = 'Pending'";
        $rows = queryArray($sql);
        if($rows != null){
            return Application::applicationsList($rows);
        }
        else return array();
    }
    
    public static function acceptedApplications(){
        $sql =  "select id from applications where status = 'Accepted'";
        $rows = queryArray($sql);
        if($rows != null){
            return Application::applicationsList($rows);
        }
        else return array();
    }
    
    public static function rejectedApplications(){
        $sql =  "select id from applications where status = 'Rejected'";
        $rows = queryArray($sql);
        if($rows != null){
            return Application::applicationsList($rows);
        }
        else return array();
    }
    
}