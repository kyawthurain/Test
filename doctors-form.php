

<?php
include("layouts/navbar.php");
 ?>
        <div id="layoutSidenav">
           <?php
           include("layouts/sidebar.php");
            ?>
            <div id="layoutSidenav_content">
                <main>
                <?php

require_once "./doctor.php";


if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];

    $doctor = new Doctor($id,$name);
    $doctor->info();
}

?>
                <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post" >

                    <div class=" mt-3">
                        <input type="text" name="id" id="" class=" form-control" placeholder="id" >
                    </div>

                    <div class=" mt-3">
                        <input type="text" name="name" id="" class=" form-control" placeholder="name" >
                    </div>

                    <div class="mt-3">
                        <button name="submit" class=" btn btn-dark">Create Doctor</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
                </main>
               <?php
               include("layouts/footer.php");
