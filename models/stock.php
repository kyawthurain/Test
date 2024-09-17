<?php
include_once"../includes/db.php";

class Stock{

    private $con;

    public function getStocksByStore($store_id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT stocks.*,products.name as pname,products.list_price as price FROM stocks JOIN products WHERE stocks.store_id=:id AND stocks.product_id=products.product_id AND stocks.quantity>0";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id",$store_id);
            $result = $statement->execute();
            if($result) return $statement->fetchAll();
            else return null;
        }
    }
}
