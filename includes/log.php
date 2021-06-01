<?php
include_once 'loader.php';
class Log{
    public $code, $date, $time, $userID, $input;
    
    public function load_valid($code){
        $sql = "select * from verification_log where log_code = '$code'";
        $rs = query($sql);
        if($rs->num_rows == 1){
            $row = $rs->fetch_array();
            $this->code = $row[0];
            $this->date = $row[1];
            $this->time = $row[2];
            $this->userID = $row[3];
            $this->input = $row[4];
            return true;
        }else return false;
    }
    
    public function load_invalid($code){
        $sql = "select * from verification_log where log_code = '$code'";
        $rs = query($sql);
        if($rs->num_rows == 1){
            $row = $rs->fetch_array();
            $this->code = $row[0];
            $this->date = $row[1];
            $this->time = $row[2];
            $this->userID = $row[3];
            $this->input = $row[5];
            return true;
        }else return false;
    }
    
    public static function allValidLogs(){
        $logs = array(); 
        $sql = "select log_code from verification_log where holder is not null";
        $rows = queryArray($sql);
        $i = 0;
        foreach ($rows as $row){
            $log = new Log();
            if($log->load_valid($row[0])){
                $logs[$i] = $log;
                $i++;
            }
        }
        return $logs;
    }
    
    public static function allFValidLogs($date){
        $logs = array();
        $sql = "select log_code from verification_log where holder is not null and date like '%$date%'";
        $rows = queryArray($sql);
        $i = 0;
        foreach ($rows as $row){
            $log = new Log();
            if($log->load_valid($row[0])){
                $logs[$i] = $log;
                $i++;
            }
        }
        return $logs;
    }
    
    public static function allInvalidLogs(){
        $logs = array();
        $sql = "select log_code from verification_log where input is not null";
        $rows = queryArray($sql);
        $i = 0;
        foreach ($rows as $row){
            $log = new Log();
            if($log->load_invalid($row[0])){
                $logs[$i] = $log;
                $i++;
            }
        }
        return $logs;
    }
    
    public static function allFInvalidLogs($date){
        $logs = array();
        $sql = "select log_code from verification_log where input is not null and date like '%$date%'";
        $rows = queryArray($sql);
        $i = 0;
        foreach ($rows as $row){
            $log = new Log();
            if($log->load_invalid($row[0])){
                $logs[$i] = $log;
                $i++;
            }
        }
        return $logs;
    }
}
    
