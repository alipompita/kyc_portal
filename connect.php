<?php

include_once 'includes/loader.php';

echo "Testing Connection.... <br>";


if(connected()){
    echo "COnnected";
}else{
    echo "Connection Failed...";
}