<?php

include("../layouts/navbar.php");
include_once '../controllers/brand-controller.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $brandController = new BrandController();
    $brand = $brandController->getBrandById($id);

}

if(isset($_POST['submit'])){
    if(!empty($_POST['name'])){
    $brandController = new BrandController();
    $result = $brandController->updateBrand($id,$_POST['name']);
    if($result) header('location:brands.php?msg=updatesuccess');
    else header('location:brands.php?msg=updatefail');
    }
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

                        <div class="row">
                            <div class="col-md-5">
                                <form action="" method="post" >
                                    <div class=" mb-3">
                                        <label for="" class=" form-label">Brand Name</label>
                                        <input type="text" name="name" class=" form-control" id="" value="<?= $brand['name'] ?>" >
                                    </div>

                                    <div class="">
                                        <button name="submit" class=" btn btn-dark" type="submit">Update Brand</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </main>
               <?php
               include("../layouts/footer.php");
?>
