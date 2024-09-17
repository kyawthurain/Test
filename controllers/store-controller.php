<?php

require_once "../models/store.php";

class StoreController{


    public function addStore($storeName,$phone,$email,$street,$city,$state,$zipCode){
        $store = new Store();
        return $store->insertStore($storeName
        ,$phone
        ,$email
        ,$street
        ,$city
        ,$state
        ,$zipCode);
    }

    public function getAllStores(){
        $store = new Store();
         return  $store->getAllStores();
    }

    public function getStoreById($id){
        $store = new Store();
        return $store->getStoreById($id);
    }

    public function updateStore($storeName,$phone,$email,$street,$city,$state,$zipCode,$id){
        $store = new Store();
        return $store->updateStore($storeName
        ,$phone
        ,$email
        ,$street
        ,$city
        ,$state
        ,$zipCode
        ,$id);
    }

    public function softDeleteStore($id){
        $store = new Store();
        return $store->softdeleteStore($id);
    }

}
