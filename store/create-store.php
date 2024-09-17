<?php

include("../layouts/navbar.php");
include_once "../controllers/store-controller.php";


if(isset($_POST['submit'])){

    $storeName = $_POST['store_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipCode = $_POST['zip_code'];

    $store = new StoreController();
    $result = $store->addStore($storeName,$phone,$email,$street,$city,$state,$zipCode);
    if($result)
        header('location:stores.php?msg=success');
    else
        header('location:stores.php?msg=fail');
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
                                        <input type="text" name="store_name" id="store_name" class=" form-control">
                                    </div>

                                    <div class=" my-4" >
                                        <label for="phone" class=" form-label" >Phone </label>
                                        <input type="text" name="phone" id="phone" class=" form-control">
                                    </div>

                                    <div class=" my-4" >
                                        <label for="email" class=" form-label" >Email</label>
                                        <input type="text" name="email" id="email" class=" form-control">
                                    </div>

                                    <div class=" my-4" >
                                        <label for="street" class=" form-label" >Street</label>
                                        <input type="text" name="street" id="street" class=" form-control">
                                    </div>

                                    <div class=" my-4" >
                                        <label for="city" class=" form-label" >City</label>
                                        <input type="text" name="city" id="city" class=" form-control">
                                    </div>

                                    <div class=" my-4" >
                                        <label for="state" class=" form-label" >State</label>
                                        <input type="text" name="state" id="state" class=" form-control">
                                    </div>

                                    <div class=" my-4" >
                                        <label for="zip_code" class=" form-label" >Zip Code</label>
                                        <input type="text" name="zip_code" id="zip_code" class=" form-control">
                                    </div>

                                    <div class="">
                                        <button name="submit" type="submit" class="btn btn-dark" >Add Store</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </main>
               <?php
               include("../layouts/footer.php");
?>
