<?php

require_once "../includes/db.php";
 class Store{
    public $con;
    public $storeName;
    public $phone;
    public $email;
    public $street;
    public $city;
    public $state;
    public $zipCode;

    public function __construct(){

    }

    public function insertStore($storeName,$phone,$email,$street,$city,$state,$zipCode) {
        $this->con = Database::connect();
        if($this->con){
            $sql = "insert into stores(store_name,phone,email,street,city,state,zip_code) values(:store_name,:phone,:email,:street,:city,:state,:zip_code)";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":store_name",$storeName);
            $statement->bindParam(":phone",$phone);
            $statement->bindParam(":email",$email);
            $statement->bindParam(":street",$street);
            $statement->bindParam(":city",$city);
            $statement->bindParam(":state",$state);
            $statement->bindParam(":zip_code",$zipCode);
            return  $statement->execute();

        }
    }

    public function getAllStores(){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT * FROM stores WHERE deleted_at is NULL";
            $statement = $this->con->prepare($sql);
            $result = $statement->execute();
            if($result) return $statement->fetchAll();
            else return null;
        }
    }

    public function getStoreById($id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT * FROM stores WHERE store_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $result = $statement->execute();
            if($result) return $statement->fetch();
            else return null;
        }
    }

    public function updateStore($storeName,$phone,$email,$street,$city,$state,$zipCode,$id){
        $this->con = Database::connect();
        if($this->con){
        $sql = "update stores set store_name=:store,
        phone=:phone,
        email=:email,
        street=:street,
        city=:city,
        state=:state,
        zip_code=:zipCode where store_id=:id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":store",$storeName);
        $statement->bindParam(":phone",$phone);
        $statement->bindParam(":email",$email);
        $statement->bindParam(":street",$street);
        $statement->bindParam(":city",$city);
        $statement->bindParam(":state",$state);
        $statement->bindParam(":zipCode",$zipCode);
        $statement->bindParam(":id",$id);
        return $statement->execute();
        }
    }

    public function softdeleteStore($id){
        $today = new DateTime();
        $dateString = $today->format('Y-m-d H:i:s');
        $this->con = Database::connect();
        if($this->con){
            $sql = "update stores set deleted_at=:date where store_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":date",$dateString);
            $statement->bindParam(":id",$id);
            return $statement->execute();
        }
    }

 }
