<?php

try{
$fp = fopen('C:\xampp\htdocs\admin-proj1\customers.csv','r');

while(($data=fgetcsv($fp,1000))!=false){
    foreach($data as $v){
        echo $v;
    }
}

}
catch(Exception $e){
    $e->getMessage();
}
finally{
    fclose($fp);
}
