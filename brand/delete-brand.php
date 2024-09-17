<?php

include_once "../controllers/brand-controller.php";

$id = $_GET['id'];
$brandController = new BrandController();
$result = $brandController->deleteBrand($id);
if($result){
    header('location:brands.php?msg=deleted');
}else{
    header('location:brands.php?msg=faildelete');
}
