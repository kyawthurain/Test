<?php
// session_start();
// if (!isset($_SESSION["username"])){
//     header("location:login.php");
// }
include("../layouts/navbar.php");
include_once "../controllers/brand-controller.php";

if(isset($_POST['submit'])){
    if(!empty($_POST['brand'])){
        $brand = $_POST['brand'];
    }

    $brandController = new BrandController();
    $result = $brandController->addBrand($brand);
    if($result)
        header('location:brands.php?msg=success');
    else
        header('location:brands.php?msg=fail');

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
                            Brand Information

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <form action="" method="post" >
                                    <div class=" my-4" >
                                        <label for="brand" class=" form-label" >Brand Name</label>
                                        <input type="text" name="brand" id="brand" class=" form-control">
                                    </div>

                                    <div class="">
                                        <button name="submit" type="submit" class="btn btn-dark" >Add Brand</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </main>
               <?php
               include("../layouts/footer.php");
?>
