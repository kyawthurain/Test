<?php

include("../layouts/navbar.php");
include_once '../controllers/product-controller.php';

$productController = new ProductController();
$products = $productController->getAllProducts();
 ?>
        <div id="layoutSidenav">
           <?php
           include("../layouts/sidebar.php");
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row">
                            Products

                        </div>
                        <div class="row">
                            <?php
                            if(isset($_GET['msg'])){
                                if($_GET['msg'] == 'success'){
                                   echo "<span class=' alert alert-success' >added Successfully</span>";
                                }elseif($_GET['msg'] == 'updatesuccess'){
                                    echo "<span class=' alert alert-success' >Successfully updated</span>";

                                }elseif($_GET['msg'] == 'updatefail'){
                                    echo "<span class=' alert alert-danger' >Error in Updating</span>";

                                }elseif($_GET['msg'] == 'deleted'){
                                    echo "<span class=' alert alert-success' >Successfully deleted</span>";

                                }elseif($_GET['msg'] == 'faildelete'){
                                    echo "<span class=' alert alert-danger' >Error in deleting</span>";

                                }
                                else{
                                   echo "<span class=' alert alert-danger' >Error in adding</span>";
                                }
                            }
                             ?>

                        </div>
                        <div class="row">
                            <div class=" col-md-4">
                                <a href="create-product.php" class="btn btn-dark" >Add Product</a>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="name" id="" class=" form-control search " >
                            </div>
                            <div class="col-md-2">
                                <button class=" btn btn-dark btnSearch" >search</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table class=" table table-bordered" id="datatablesSimple" >
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Product Name</th>
                                            <th>List Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody" >
                                        <?php

                                        $count = 1;

                                        foreach($products as $product){

                                            echo "<tr id='".$product['product_id']."'>";
                                            echo "<td>".$count++."</td>";
                                            echo "<td>".$product['name']."</td>";
                                            echo "<td>".$product['list_price']."</td>";
                                            echo "<td>";
                                            echo "<a class=' btn btn-info mx-2' href='read-product.php?id=".$product['product_id']."' >Read</a>";
                                            echo "<a class=' btn btn-warning mx-2' href='edit-product.php?id=".$product['product_id']."' >Edit</a>";
                                            // echo "<a class=' btn btn-danger mx-2' href='delete-product.php?id=".$product['product_id']."' >Delete</a>";
                                            // echo "<a class=' btn btn-danger mx-2' href='softdelete-product.php?id=".$product['product_id']."' >SoftDelete</a>";
                                            echo "<a class=' btn btn-danger mx-2 btnDeleteProduct' >Ajax delete</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }

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
