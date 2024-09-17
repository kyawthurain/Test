a<?php

include("../layouts/navbar.php");
include_once "../controllers/order-controller.php";

$order_id = $_GET['id'];
$orderController = new OrderController();
$order = $orderController->getOrderById($order_id);
$order_items = $orderController->getOrderItems($order_id);

 ?>
        <div id="layoutSidenav">
           <?php
           include("../layouts/sidebar.php");
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row">
                            Orders Invoice
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3 ">
                                <span class=" text-primary">Customer Name : </span>
                                <?= $order['cfn']." ".$order['cln'] ?>
                            </div>

                            <div class="col-md-4 mb-3 ">
                                <span class=" text-primary">Order Date : </span>
                                <?= $order['order_date'] ?>
                            </div>

                            <div class="col-md-4 mb-3 ">
                                <span class=" text-primary">Required Date : </span>
                                <?= $order['required_date'] ?>
                            </div>

                            <div class="col-md-4 mb-3 ">
                                <span class=" text-primary">Shipped Date : </span>
                                <?= $order['shipped_date'] ?>
                            </div>

                            <div class="col-md-4 mb-3 ">
                                <span class=" text-primary">Store Name : </span>
                                <?= $order['sname'] ?>
                            </div>

                            <div class="col-md-4 mb-3 ">
                                <span class=" text-primary">Staff Name : </span>
                                <?= $order['sfn']." ".$order['sln'] ?>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class=" table table-striped" >
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th class=' text-end' >Unit Price</th>
                                            <th class=' text-end' >Quantity</th>
                                            <th class=' text-end' >Discount</th>
                                            <th class=' text-end' >Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                            foreach($order_items as $item){
                                                echo "<tr>";
                                                echo "<td>".$item['pname']."</td>";
                                                echo "<td class=' text-end' >".$item['list_price']."</td>";
                                                echo "<td class=' text-end' >".$item['quantity']."</td>";
                                                echo "<td class=' text-end' >".$item['discount']."</td>";
                                                echo "<td class=' text-end' >".(($item['list_price'] * $item['quantity']) -  ($item['discount'] * $item['quantity']))."</td>";
                                                echo "</tr>";
                                                $total += (($item['list_price'] * $item['quantity']) -  ($item['discount'] * $item['quantity']));
                                            }

                                            echo "<tr>";
                                            echo "<td colspan=4>Total</td>";
                                            echo "<td class=' text-end'>".$total."</td>";
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
