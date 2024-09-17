<?php

include("../layouts/navbar.php");
include_once '../controllers/product-controller.php';
include_once "../controllers/brand-controller.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

   $productController = new ProductController();
   $product = $productController->getProductById($id);

   $brandId = $product['brand_id'];
   $brandController = new BrandController();
   $brand = $brandController->getBrandById($brandId);


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

                        <h3 class=" text-center mt-3" >Product Information</h3>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table class=" table table-bordered" >
                                    <thead>
                                        <tr>

                                            <th>Product Name</th>
                                            <th>Category Id</th>
                                            <th>Brand Id</th>
                                            <th>Brand Name</th>
                                            <th>List Price</th>
                                            <th>Model Year</th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody" >
                                        <?php



                                            echo "<tr id='".$product['product_id']."'>";
                                            echo "<td>".$product['name']."</td>";
                                            echo "<td>".$product['category_id']."</td>";
                                            echo "<td>".$product['brand_id']."</td>";
                                            echo "<td>".$brand['name']."</td>";
                                            echo "<td>".$product['list_price']."</td>";
                                            echo "<td>".$product['model_year']."</td>";
                                            echo "<td>";
                                            echo "</td>";
                                            echo "</tr>";


                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </main>
               <?php
               include("../layouts/footer.php");
?>
