<?php
Class Loader{
    public static $host = "localhost", $user = "root", $password = "", $db = "kyc_portal_db";
}

function connected(): bool {
    $mysqli = new mysqli("localhost", "dev", "", "kyc_portal_db");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        return false;
    }
    echo $mysqli->host_info . "\n";
    return true;

}


function getConnection() : mysqli{
    return new mysqli("localhost", "dev", "", "kyc_portal_db");
}

function query($sql){
    return getConnection()->query($sql);
}

function execute($sql){
    getConnection()->query($sql);
}

function queryArray($sql){//for quuries that should return an array
    $result_set = getConnection()->query($sql);
    if($result_set->num_rows > 0){
        $list = array();
        for ($i = 0; $i < $result_set->num_rows; $i++){
            $values = $result_set->fetch_array(MYSQLI_NUM);
            $list[$i] = $values;
        }
        return $list;
    }else return null;
}




