<?php
include_once "../includes/db.php";
class Customer{
    public $firstname,$lastname,$phone,$email,$street,$city,$state,$zip_code;

    public $con;
    // public function __construct($firstname,$lastname,$phone,$email,$street,$city,$state,$zip_code)
    // {
    //     $this->firstname=$firstname;
    //     $this->lastname=$lastname;
    //     $this->phone=$phone;
    //     $this->email=$email;
    //     $this->street=$street;
    //     $this->city=$city;
    //     $this->state=$state;
    //     $this->zip_code=$zip_code;
    // }
    public function __construct()
    {

    }
    public function insertCustomer($firstname,$lastname,$phone,$email,$street,$city,$state,$zip_code)
    {
        $this->con=DataBase::connect();
        if($this->con)
        {
            $sql="insert into customers(first_name, last_name, phone, email, street, city, state, zip_code)
            values (:first_name, :last_name, :phone, :email, :street, :city, :state, :zip_code)";
            $statement=$this->con->prepare($sql);
            $statement->bindParam("first_name",$firstname);
            $statement->bindParam("last_name",$lastname);
            $statement->bindParam("phone",$phone);
            $statement->bindParam("email",$email);
            $statement->bindParam("street",$street);
            $statement->bindParam("city",$city);
            $statement->bindParam("state",$state);
            $statement->bindParam("zip_code",$zip_code);
            //execute
            $result=$statement->execute(); //true or false
            return $result;
        }
    }
    public function getALlCustomer()
    {
        $this->con=DataBase::connect();
        $sql="select * from customers where deleted_at is null";
        $statement=$this->con->prepare($sql);
        $result=$statement->execute();
        if($result)
            return $statement->fetchAll();
        return null;
    }

    public function getCustomerById($id)
    {
        $this->con=DataBase::connect();
        $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select * from customers where customer_id=:id";
        $statement=$this->con->prepare($sql);
        $statement->bindParam(":id",$id);
        $result=$statement->execute();
        if($result)
            return $statement->fetch();
        return null;
    }
    public function updateCustomer($id,$firstname,$lastname,$phone,$email,$street,$city,$state,$zip_code){
        $this->con=DataBase::connect();
        $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="update customers set first_name = :first_name, last_name = :last_name, phone = :phone, email = :email, street = :street, city = :city, state = :state, zip_code = :zip_code
         where customer_id=:id";
        $statement=$this->con->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->bindParam("first_name",$firstname);
        $statement->bindParam("last_name",$lastname);
        $statement->bindParam("phone",$phone);
        $statement->bindParam("email",$email);
        $statement->bindParam("street",$street);
        $statement->bindParam("city",$city);
        $statement->bindParam("state",$state);
        $statement->bindParam("zip_code",$zip_code);
        $result=$statement->execute();
        return $result;
    }
    function deleteCustomer($id)
    {
        $today=new DateTime();

        $this->con=DataBase::connect();
        $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        if($this->con){
            $stringDate=$today->format('Y-m-d-H-i-s');
            $sql="update customers set deleted_at=:date where customer_id=:id";
            $statement=$this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $statement->bindParam(":date",$stringDate);
            $result=$statement->execute();
            return $result;
        }
    }
    function searchCustomer($data)
    {
        $this->con=DataBase::connect();
        $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select * from customers where first_name like :data or last_name like :data or email like :data
        and deleted_at is null";
        $statement=$this->con->prepare($sql);
        $search_data="%".$data."%";
        $statement->bindParam(":data",$search_data);
        $result=$statement->execute();
        if($result)
        {
            return $statement->fetchAll();
        }
        else{
            return null;
        }
    }

    public function getCustomerByState(){
        $this->con=DataBase::connect();
        $sql="select state,count(*) as numCus from customers group by state";
        $statement=$this->con->prepare($sql);
        $result = $statement->execute();
        if($result) return $statement->fetchAll();
        else return null;
    }

    public function customerCount(){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT count(*) as count from customers";
            $statement = $this->con->prepare($sql);
            $result = $statement->execute();
            if($result) return $statement->fetch();
            else return null;
    }
    }
}
?>
