<?php

include_once "../controllers/brand-controller.php";

$id = $_POST['id'];
$brandController = new BrandController();
$result = $brandController->softdeleteBrand($id);
if($result){
    // echo "success";
    $data = array(
        "status" => "true"
    );
    echo json_encode($data);
}else{
    // echo "fail";
    $data = array(
        "status" => "false"
    );
    echo json_encode($data);
}
