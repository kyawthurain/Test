<?php
session_start();
if (!isset($_SESSION["username"])){
    header("location:login.php");
}
include("layouts/navbar.php");
 ?>
        <div id="layoutSidenav">
           <?php
           include("layouts/sidebar.php");
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <a href="create-customer.php" class=" btn btn-dark btn-sm" >Crate new customer</a>
                                <a href="export.php" class=" btn btn-dark btn-sm" >Export customer CSV</a>
                                <a href="import.php" class=" btn btn-dark btn-sm" >Import customer CSV</a>
                            </div>
                        </div>
                    </div>
                </main>
               <?php
               include("layouts/footer.php");
?>
