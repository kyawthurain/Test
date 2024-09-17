<?php

include_once "../controllers/customer_controller.php";

if(isset($_POST['customer'])){
    $customerController = new CustomerController();
    $result = $customerController->getCustomerByState();

    echo json_encode($result);

}
