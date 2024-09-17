<?php

include("../layouts/navbar.php");
include_once '../controllers/store-controller.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

   $storeController = new StoreController();
   $store = $storeController->getStoreById($id);

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

                        <h3 class=" text-center mt-3" >Store Information</h3>

                        </div>

                        <div class="row">
                            <div class="col-md-4 mx-auto my-2">

                            <ul class="list-group list-group-horizontal list-group-flush">
                            <li class="list-group-item">Number : </li>
                            <li class="list-group-item"><?= $store['store_id'] ?></li>
                            </ul>

                            <ul class="list-group list-group-horizontal list-group-flush">
                            <li class="list-group-item">Store Name : </li>
                            <li class="list-group-item"><?= $store['store_name'] ?></li>
                            </ul>

                            <ul class="list-group list-group-horizontal list-group-flush">
                            <li class="list-group-item">Phone : </li>
                            <li class="list-group-item"><?= $store['phone'] ?></li>
                            </ul>

                            <ul class="list-group list-group-horizontal list-group-flush">
                            <li class="list-group-item">Email : </li>
                            <li class="list-group-item"><?= $store['email'] ?></li>
                            </ul>

                            <ul class="list-group list-group-horizontal list-group-flush">
                            <li class="list-group-item">Street : </li>
                            <li class="list-group-item"><?= $store['street'] ?></li>
                            </ul>

                            <ul class="list-group list-group-horizontal list-group-flush">
                            <li class="list-group-item">City : </li>
                            <li class="list-group-item"><?= $store['city'] ?></li>
                            </ul>

                            <ul class="list-group list-group-horizontal list-group-flush">
                            <li class="list-group-item">State : </li>
                            <li class="list-group-item"><?= $store['state'] ?></li>
                            </ul>

                            <ul class="list-group list-group-horizontal list-group-flush">
                            <li class="list-group-item">Zip Code : </li>
                            <li class="list-group-item"><?= $store['zip_code'] ?></li>
                            </ul>

                            </div>
                        </div>

                    </div>
                </main>
               <?php
               include("../layouts/footer.php");
?>
