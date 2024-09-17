<?php

include_once "includes/db.php";

if(Database::connect()!=null){
    echo "success";
}else{
    echo "fail";
}

