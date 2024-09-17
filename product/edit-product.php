<?php

include("../layouts/navbar.php");
include_once "../controllers/product-controller.php";
include_once "../controllers/brand-controller.php";


if(isset($_GET['id'])){
    $id = $_GET['id'];

    $productController = new ProductController();
    $product = $productController->getProductById($id);
}

if(isset($_POST['submit'])){

    $productName = $_POST['product_name'];
    $brandId = $_POST['brand_id'];
    $categoryId = $_POST['category_id'];
    $listPrice = $_POST['list_price'];
    $modelYear = $_POST['model_year'];

    $product = new ProductController();
    $result = $product->updateProduct($productName,$brandId,$categoryId,$listPrice,$modelYear,$id);
    if($result)
        header('location:products.php?msg=updatesuccess');
    else
        header('location:products.php?msg=updatefail');
}

$brandController = new BrandController();
$brands = $brandController->getBrands();

// $categories = [

// ]

 ?>
        <div id="layoutSidenav">
           <?php
           include("../layouts/sidebar.php");
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row">
                            <h1 class=" text-center" >Create a product</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-5  mx-auto  my-1">
                                <form action="" method="post" class=" border rounded p-3" >

                                    <div class=" my-4" >
                                        <label for="product_name" class=" form-label" >Product Name</label>
                                        <input type="text" name="product_name" id="product_name" class=" form-control" value="<?= $product['name'] ?>" required >
                                    </div>

                                    <div class=" my-4" >
                                        <label class=" form-label" for=""> Brand Id</label>
                                    <select name="brand_id" class="form-select">
                                    <option value="<?= $product['brand_id'] ?? "0" ?>" ><?= $product['brand_id'] ?? "Default" ?></option>
                                    <?php

                                    foreach($brands as $brand){
                                        echo "<option value='".$brand['brand_id']."'>";
                                        echo $brand['name'];
                                        echo "</option>";
                                    }

                                    ?>
                                    </select>
                                    </div>

                                    <div class=" my-4" >
                                    <label class=" form-label" for=""> Category Id</label>

                                    <select name="category_id" class="form-select">
                                    <option value="<?= $product['brand_id'] ?? "0" ?>" ><?= $product['category_id'] ?? "Default" ?></option>

                                    <?php

                                    foreach($brands as $brand){
                                        echo "<option value='".$brand['brand_id']."'>";
                                        echo $brand['name'];
                                        echo "</option>";
                                    }

                                    ?>
                                    </select>
                                    </div>


                                    <div class=" my-4" >
                                        <label for="list_price" class=" form-label" >List Price</label>
                                        <input type="number" name="list_price" id="list_price" value="<?= $product['list_price'] ?>" class=" form-control">
                                    </div>

                                    <div class=" my-4" >
                                        <label for="model_year" class=" form-label" >Model Year</label>
                                        <input type="number" name="model_year" id="model_year" value="<?= $product['model_year'] ?>" class=" form-control">
                                    </div>

                                    <div class="">
                                        <button name="submit" type="submit" class="btn btn-dark" >Update Product</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </main>
               <?php
               include("../layouts/footer.php");
?>
