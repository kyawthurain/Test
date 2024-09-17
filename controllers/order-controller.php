<?php

include_once "../models/order.php";

class OrderController{

    public function addOrder($cid,$sid,$ordered_date,$required_date,$products){
        $order = new Order();
        return $order->addOrder($cid,$sid,$ordered_date,$required_date,$products);
    }

    public function createOrder($customerId,$orderStatus,$orderDate,$requiredDate,$shippedDate,$storeId,$staffId){
        $order = new Order();
        return $order->insertOrder($customerId,$orderStatus,$orderDate,$requiredDate,$shippedDate,$storeId,$staffId);
    }

    public function getAllOrders(){
        $order = new Order();
        return $order->getAllOrders();
    }

    public function getOrderById($id){
        $order = new Order();
        return $order->getOrderById($id);
    }

    public function updateOrder($customerId,$orderStatus,$orderDate,$requiredDate,$shippedDate,$storeId,$staffId,$id){
        $order = new Order();
        return $order->updateOrder($customerId,$orderStatus,$orderDate,$requiredDate,$shippedDate,$storeId,$staffId,$id);
    }

    public function getOrderItems($id){
        $order = new Order();
        return $order->getOrderItems($id);
    }

    public function orderCount(){
        $order = new Order();
        return $order->orderCount();
    }

    public function getFullOrder($id){
        $order = new Order();
        return $order->getFullOrder($id);
    }

}
