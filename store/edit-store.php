<?php

include("../layouts/navbar.php");
include_once "../controllers/store-controller.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $storeController = new StoreController();
    $store = $storeController->getStoreById($id);
}

if(isset($_POST['submit'])){

    $storeName = $_POST['store_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipCode = $_POST['zip_code'];

    $store = new StoreController();
    $result = $store->updateStore($storeName,$phone,$email,$street,$city,$state,$zipCode,$id);
    if($result)
        header('location:stores.php?msg=updatesuccess');
    else
        header('location:stores.php?msg=updatefail');
}

 ?>
        <div id="layoutSidenav">
           <?php
           include("../layouts/sidebar.php");
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row">
                            <h1 class=" text-center" >Create a store</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-5  mx-auto  my-1">
                                <form action="" method="post" class=" border rounded p-3" >

                                    <div class=" my-4" >
                                        <label for="store_name" class=" form-label" >Store Name</label>
                                        <input type="text" name="store_name" id="store_name" class=" form-control" value="<?= $store['store_name'] ?>" >
                                    </div>

                                    <div class=" my-4" >
                                        <label for="phone" class=" form-label" >Phone </label>
                                        <input type="text" name="phone" id="phone" class=" form-control" value="<?= $store['phone'] ?>" >
                                    </div>

                                    <div class=" my-4" >
                                        <label for="email" class=" form-label" >Email</label>
                                        <input type="text" name="email" id="email" class=" form-control" value="<?= $store['email'] ?>" >
                                    </div>

                                    <div class=" my-4" >
                                        <label for="street" class=" form-label" >Street</label>
                                        <input type="text" name="street" id="street" class=" form-control" value="<?= $store['street'] ?>" >
                                    </div>

                                    <div class=" my-4" >
                                        <label for="city" class=" form-label" >City</label>
                                        <input type="text" name="city" id="city" class=" form-control" value="<?= $store['city'] ?>" >
                                    </div>

                                    <div class=" my-4" >
                                        <label for="state" class=" form-label" >State</label>
                                        <input type="text" name="state" id="state" class=" form-control" value="<?= $store['state'] ?>" >
                                    </div>

                                    <div class=" my-4" >
                                        <label for="zip_code" class=" form-label" >Zip Code</label>
                                        <input type="text" name="zip_code" id="zip_code" class=" form-control" value="<?= $store['zip_code'] ?>" >
                                    </div>

                                    <div class="">
                                        <button name="submit" type="submit" class="btn btn-dark" >Update Store</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </main>
               <?php
               include("../layouts/footer.php");
?>
