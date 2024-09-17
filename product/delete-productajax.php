<?php

include_once "../controllers/product-controller.php";

$id = $_POST['id'];
$productController = new ProductController();
$result = $productController->softDeleteProduct($id);
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
