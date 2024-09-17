<?php

include_once "../includes/db.php";

class Brand{

    public $name;
    public $con;

    public function __construct()
    {
        $this->name = "default";
    }

    public function insertBrand($name){
        $this->con = Database::connect();
        if($this->con){
            $sql = "insert into brands(name) values(:name)";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":name",$name);
            $result = $statement->execute();
             return $result;
        }
    }

    public function getAllBrands(){
        $this->con = Database::connect();
        if($this->con){
            $sql = "select * from brands where deleted_at is NULL";
            $statement = $this->con->prepare($sql);
            $result = $statement->execute();
            if($result) return $statement->fetchAll();
            else return null;
        }
    }

    public function getBrandById($id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "select * from brands where brand_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $result = $statement->execute();
            if($result) return $statement->fetch();
            else return null;
        }
    }

    public function updateBrand($id,$name){
        $this->con = Database::connect();
        // $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        if($this->con){
            $sql = "update brands set name=:name where brand_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":name",$name);
            $statement->bindParam(":id",$id);
            $result = $statement->execute();
            return $result;
        }
    }

    public function deleteBrand($id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "delete from brands where brand_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $result = $statement->execute();
            return $result;
        }
    }

    public function softdeleteBrand($id){
        $today = new DateTime();
        $dateString = $today->format('Y-m-d H:i:s');
        $this->con = Database::connect();
        if($this->con){
            $sql = "update brands set deleted_at=:date where brand_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":date",$dateString);
            $statement->bindParam(":id",$id);
            $result = $statement->execute();
            return $result;
        }
    }

    public function search($data){
        $this->con = Database::connect();
        if($this->con){
            $sql = "select * from brands where name like :data AND deleted_at is null";
            $statement = $this->con->prepare($sql);
            $searchData = "%".$data."%";
            $statement->bindParam(":data",$searchData);
            $result = $statement->execute();
            if($result) return $statement->fetchAll();
            else return null;
        }
    }


}
