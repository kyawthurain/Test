<?php

include("../layouts/navbar.php");
include_once '../controllers/brand-controller.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $brandController = new BrandController();
    $brand = $brandController->getBrandById($id);

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

                        <h3 class=" text-center mt-3" >Brand Information</h3>

                        </div>

                        <div class="row">
                            <div class="col-md-4 mx-auto mt-2 ">
                               <p class="" >Brand Name : <?= $brand['name'] ?></p>
                            </div>
                        </div>

                    </div>
                </main>
               <?php
               include("../layouts/footer.php");
?>
