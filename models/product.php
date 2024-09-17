<?php

require_once "../includes/db.php";

class Product{
    public $con;
    public $productName;
    public $brandId;
    public $categoryId;
    public $listPrice;
    public $modelYear;

    public function __construct(){

    }

    public function insertProduct($productName,$brandId,$categoryId,$listPrice,$modelYear){
        $this->con = Database::connect();
        if($this->con){
            $sql = "insert into products(name,brand_id,category_id,list_price,model_year) values(:product_name,:brand_id,:category_id,:list_price,:model_year)";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":product_name",$productName);
            $statement->bindParam(":brand_id",$brandId);
            $statement->bindParam(":category_id",$categoryId);
            $statement->bindParam(":list_price",$listPrice);
            $statement->bindParam(":model_year",$modelYear);
            $result =  $statement->execute();
            return $result;
        }
    }

    public function getAllProducts(){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT * FROM products WHERE deleted_at is NULL";
            $statement = $this->con->prepare($sql);
            $result = $statement->execute();
            if($result) return $statement->fetchAll();
            else return null;
        }
    }

    public function getProductById($id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT * FROM products WHERE product_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $result = $statement->execute();
            if($result) return $statement->fetch();
            else return null;
        }
    }

    public function updateProduct($productName,$brandId,$categoryId,$listPrice,$modelYear,$id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "update products set name=:product_name,
            brand_id=:brand_id
            ,category_id=:category_id,
            list_price=:list_price,
            model_year=:model_year where product_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":product_name",$productName);
            $statement->bindParam(":brand_id",$brandId);
            $statement->bindParam(":category_id",$categoryId);
            $statement->bindParam(":list_price",$listPrice);
            $statement->bindParam(":model_year",$modelYear);
            $statement->bindParam(":id",$id);
            return $statement->execute();

        }
    }

    public function softdeleteProduct($id){
        $today = new DateTime();
        $dateString = $today->format('Y-m-d H:i:s');
        $this->con = Database::connect();
        if($this->con){
            $sql = "update products set deleted_at=:date where product_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":date",$dateString);
            $statement->bindParam(":id",$id);
            $result = $statement->execute();
            return $result;
        }
    }


}
