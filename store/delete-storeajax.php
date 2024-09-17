<?php

include_once "../controllers/store-controller.php";

$id = $_POST['id'];
$storeController = new StoreController();
$result = $storeController->softDeleteStore($id);

if($result){
    $data = array(
        "status" => "true"
    );
    echo json_encode($data);

}else{
    $data = array(
        "status" => "false"
    );
    echo json_encode($data);

}
