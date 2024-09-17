<?php
include_once "../models/customer.php";

class CustomerController{
    //public $firstname,$lastname,$phone,$email,$street,$city,$state,$zip_code;
    public $customer;
    public function addCustomer($firstname,$lastname,$phone,$email,$street,$city,$state,$zip_code)
    {
        $customer=new Customer();
        $result=$customer->insertCustomer($firstname,$lastname,$phone,$email,$street,$city,$state,$zip_code);
        return $result;
    }
    function getCustomer()
    {
        $customer=new Customer();
        $customers=$customer->getAllCustomer();
        return $customers;
    }
    function getCustomerById($id)
    {
        $customer=new Customer();
        $customerinfo=$customer->getCustomerById($id);
        return $customerinfo;
    }
    function updateCustomer($id,$firstname,$lastname,$phone,$email,$street,$city,$state,$zip_code)
    {
        $customer=new Customer();
        $result=$customer->updateCustomer($id,$firstname,$lastname,$phone,$email,$street,$city,$state,$zip_code);
        return $result;
    }
    function deleteCustomer($id)
    {
        $customer=new Customer();
        $result=$customer->deleteCustomer($id);
        return $result;
    }
    function searchCustomer($data)
    {
        $customer=new Customer();
        $result=$customer->searchCustomer($data);
        return $result;
    }

    function getCustomerByState(){
        $customer = new Customer();
        return $customer->getCustomerByState();
    }

    function customerCount(){
        $customer = new Customer();
        return $customer->customerCount();
    }
}
?>
