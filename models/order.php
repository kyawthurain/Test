<?php

require_once "../includes/db.php";

class Order{
    public $con;
    public $customerId;
    public $orderStatus;
    public $orderDate;
    public $requiredDate;
    public $shippedDate;
    public $storeId;
    public $staffId;

    public function __construct(){

    }

    public function addOrder($cid,$sid,$ordered_date,$required_date,$products){
        $this->con = Database::connect();
        if($this->con){
            $sql = "INSERT INTO orders(customer_id,order_date,required_date,store_id) values(:cid,:orderedDate,:requiredDate,:sid)";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":cid",$cid);
            $statement->bindParam(":orderedDate",$ordered_date);
            $statement->bindParam(":requiredDate",$required_date);
            $statement->bindParam(":sid",$sid);
            $result = $statement->execute();
            if($result){
                $sql = "select max(order_id) as id from orders";
                $statement = $this->con->prepare($sql);
                $result1 = $statement->execute();
                if($result1){
                    $order = $statement->fetch();
                    $order_id = $order['id'];
                    $sql = "INSERT INTO order_items(order_id,item_id,product_id,quantity,list_price,discount)
                    VALUES(:id,:item_id,:pid,:qty,:price,:discount)";
                    for($count = 0;$count<count($products);$count++){
                        $item = $count+1;
                        $statement = $this->con->prepare($sql);
                        $statement->bindParam(":id",$order_id);
                        $statement->bindParam(":item_id",$item);
                        $statement->bindParam(":pid",$products[$count][0]);
                        $statement->bindParam(":qty",$products[$count][2]);
                        $statement->bindParam(":price",$products[$count][1]);
                        $statement->bindParam(":discount",$products[$count][3]);
                        $result2 = $statement->execute();
                        if(!$result2){
                            return false;
                        }
                    }
                }
                return true;
            }else{
                return false;
            }
        }
    }

    public function insertOrder($customerId,$orderStatus,$orderDate,$requiredDate,$shippedDate,$storeId,$staffId){
        $this->con = Database::connect();
        if($this->con){
            $sql = "INSERT INTO orders(customer_id,order_status,order_date,required_date,shipped_date,store_id,staff_id) values(:customerId,:orderStatus,:orderDate,:requiredDate,:shippedDate,:storeId,:staffId)";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":customerId",$customerId);
            $statement->bindParam(":orderStatus",$orderStatus);
            $statement->bindParam(":orderDate",$orderDate);
            $statement->bindParam(":requiredDate",$requiredDate);
            $statement->bindParam(":shippedDate",$shippedDate);
            $statement->bindParam(":storeId",$storeId);
            $statement->bindParam(":staffId",$staffId);
            return $statement->execute();
        }
    }

    public function getAllOrders(){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT orders.*,customers.first_name as cfn,
            customers.last_name as cln,
            stores.store_name as sname,
            staffs.first_name as sfn,
            staffs.last_name as sln
             FROM orders join customers join stores join staffs WHERE orders.customer_id=customers.customer_id and orders.store_id=stores.store_id and orders.staff_id=staffs.staff_id";
            $statement = $this->con->prepare($sql);
            $result = $statement->execute();
            if($result) return $statement->fetchAll();
            else return null;
        }
    }

    public function getOrderById($id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT orders.*,customers.first_name as cfn,
            customers.last_name as cln,
            stores.store_name as sname,
            staffs.first_name as sfn,
            staffs.last_name as sln
             FROM orders join customers join stores join staffs WHERE orders.order_id=:id and orders.customer_id=customers.customer_id and orders.store_id=stores.store_id and orders.staff_id=staffs.staff_id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $result = $statement->execute();
            if($result) return $statement->fetch();
            else return null;
        }
    }

    public function updateOrder($customerId,$orderStatus,$orderDate,$requiredDate,$shippedDate,$storeId,$staffId,$id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "update orders set customer_id=:customerId,
            order_status=:orderStatus,
            order_date=:orderDate,
            required_date=:requiredDate,
            shipped_date=:shippedDate,
            store_id=:storeId,
            staff_id=:staffId where order_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":customerId",$customerId);
            $statement->bindParam(":orderStatus",$orderStatus);
            $statement->bindParam(":orderDate",$orderDate);
            $statement->bindParam(":requiredDate",$requiredDate);
            $statement->bindParam(":shippedDate",$shippedDate);
            $statement->bindParam(":storeId",$storeId);
            $statement->bindParam(":staffId",$staffId);
            $statement->bindParam(":id",$id);
            return $statement->execute();
        }
    }

    public function getOrderItems($id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "select order_items.*, products.name as pname from order_items join products
            where order_items.order_id=:id and order_items.product_id=products.product_id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $result = $statement->execute();
            if($result) return $statement->fetchAll();
            else return null;
        }
    }

    public function orderCount(){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT count(*) as count from orders";
            $statement = $this->con->prepare($sql);
            $result = $statement->execute();
            if($result) return $statement->fetch();
            else return null;
    }
}

public function getFullOrder($id){
    $this->con = Database::connect();
    if($this->con){
        $sql = "SELECT orders.*,customers.*,stores.store_name as sname  FROM orders join customers join stores WHERE orders.order_id=:id and orders.customer_id=customers.customer_id and orders.store_id=stores.store_id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id",$id);
        $result = $statement->execute();
        if($result) return $statement->fetch();
        else return null;
    }
}





}
