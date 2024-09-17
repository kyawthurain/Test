<?php

include("../layouts/navbar.php");
include_once "../controllers/order-controller.php";

$orderController = new OrderController();
$orders = $orderController->getAllOrders();

 ?>
        <div id="layoutSidenav">
           <?php
           include("../layouts/sidebar.php");
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row">
                            Orders Information

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
                            <div class="col-md-3">
                                <a href="create_order.php" class=" btn btn-dark" >Create Order</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table class=" table table-striped" id="datatablesSimple" >
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Customer</th>
                                            <th>Status</th>
                                            <th>Order date</th>
                                            <th>Required Date</th>
                                            <th>Shipped date</th>
                                            <th>Store</th>
                                            <th>Staff</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 1;
                                    foreach($orders as $order){
                                        echo "<tr>";
                                        echo "<td>".$count++."</td>";
                                        echo "<td>".$order['cfn']."</td>";
                                        echo "<td>".$order['order_status']."</td>";
                                        echo "<td>".$order['order_date']."</td>";
                                        echo "<td>".$order['required_date']."</td>";
                                        echo "<td>".$order['shipped_date']."</td>";
                                        echo "<td>".$order['sname']."</td>";
                                        echo "<td>".$order['sfn']."</td>";
                                        echo "<td>";
                                        echo "<a class=' btn btn-info btn-sm' href='order-detail.php?id=".$order['order_id']."'>detail</a>";
                                        echo "<button class=' btn btn-success btn-sm send' onclick=sendEmail(".$order['order_id'].") >Send Email</button>";
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
                <script>
                    function sendEmail(id){
                        console.log(id);
                        $.ajax({
                            type: "method",
                            method : 'post',
                            url: "send.php",
                            data: {data:id},
                            success: function (response) {
                                alert(response)
                            }
                        });
                    }
                </script>
               <?php
               include("../layouts/footer.php");
?>
