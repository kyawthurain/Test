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
                                <h4>New customer</h4>
                            </div>
                        </div>
                    </div>
                </main>
               <?php
               include("layouts/footer.php");
?>
