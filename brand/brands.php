<?php

include("../layouts/navbar.php");
include_once '../controllers/brand-controller.php';
$brandController = new BrandController();
$brands = $brandController->getBrands();

 ?>
        <div id="layoutSidenav">
           <?php
           include("../layouts/sidebar.php");
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row">
                            Brands Information

                        </div>
                        <div class="row">
                            <?php
                            if(isset($_GET['msg'])){
                                if($_GET['msg'] == 'success'){
                                   echo "<span class=' alert alert-success' >Brand is added Successfully</span>";
                                }elseif($_GET['msg'] == 'updatesuccess'){
                                    echo "<span class=' alert alert-success' >Successfully updated</span>";

                                }elseif($_GET['msg'] == 'updatefail'){
                                    echo "<span class=' alert alert-danger' >Error in Updating brands</span>";

                                }elseif($_GET['msg'] == 'deleted'){
                                    echo "<span class=' alert alert-success' >Successfully deleted</span>";

                                }elseif($_GET['msg'] == 'faildelete'){
                                    echo "<span class=' alert alert-danger' >Error in deleting brands</span>";

                                }
                                else{
                                   echo "<span class=' alert alert-danger' >Error in adding brands</span>";
                                }
                            }
                             ?>

                        </div>
                        <div class="row">
                            <div class=" col-md-4">
                                <a href="create-brand.php" class="btn btn-dark" >Add Brand</a>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="name" id="" class=" form-control search " >
                            </div>
                            <div class="col-md-2">
                                <button class=" btn btn-dark btnSearch" >search</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <table class=" table table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Brand Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody" >
                                        <?php

                                        $count = 1;

                                        foreach($brands as $brand){

                                            echo "<tr id='".$brand['brand_id']."'>";
                                            echo "<td>".$count++."</td>";
                                            echo "<td>".$brand['name']."</td>";
                                            echo "<td>";
                                            echo "<a class=' btn btn-info mx-2' href='read-brand.php?id=".$brand['brand_id']."' >Read</a>";
                                            echo "<a class=' btn btn-warning mx-2' href='edit-brand.php?id=".$brand['brand_id']."' >Edit</a>";
                                            echo "<a class=' btn btn-danger mx-2' href='delete-brand.php?id=".$brand['brand_id']."' >Delete</a>";
                                            echo "<a class=' btn btn-danger mx-2' href='softdelete-brand.php?id=".$brand['brand_id']."' >SoftDelete</a>";
                                            echo "<a class=' btn btn-danger mx-2 btnDelete' >Ajax delete</a>";
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
