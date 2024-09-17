<?php

include("../layouts/navbar.php");
require_once "../controllers/store-controller.php";

$storeController = new StoreController();
$stores = $storeController->getAllStores();

 ?>
        <div id="layoutSidenav">
           <?php
           include("../layouts/sidebar.php");
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">

                        <div class="row">
                            Stores Information
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
                                <a href="create-store.php" class="btn btn-dark" >Add Stores</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <table class=" table table-bordered caption-top" >
                                    <caption>list of stores</caption>
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>City</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                            <?php
                                            $count =1;
                                                foreach($stores as $store){
                                                    echo "<tr id='".$store['store_id']."'>";
                                                    echo "<td>".$count++."</td>";
                                                    echo "<td>".$store['store_name']."</td>";
                                                    echo "<td>".$store['phone']."</td>";
                                                    echo "<td>".$store['email']."</td>";
                                                    echo "<td>".$store['city']."</td>";
                                                    echo "<td>";
                                                    echo "<a class=' btn btn-sm btn-info mx-2' href='read-store.php?id=".$store['store_id']."' >Read</a>";
                                                    echo "<a class=' btn btn-sm btn-warning mx-2' href='edit-store.php?id=".$store['store_id']."' >Edit</a>";
                                                    echo "<a class=' btn btn-sm btn-danger mx-2 btnDeleteStore ' >Delete</a>";
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
