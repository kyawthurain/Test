<?php

include("../layouts/navbar.php");
include_once "../controllers/order-controller.php";
include_once "../controllers/customer_controller.php";
include_once "../controllers/store-controller.php";
include_once "../controllers/stock-controller.php";

$customerController = new CustomerController();
$storeController = new StoreController();
$stores = $storeController->getAllStores();
$customers = $customerController->getCustomer();
$stockController = new StockController();
$stocks = $stockController->getStockByStore($stores[0]['store_id']);

if(isset($_POST['submit'])){
    $cid = $_POST['cname'];
    $sid = $_POST['sname'];
    $ordered_date = $_POST['order_date'];
    $required_date = $_POST['required_date'];

    $product_names = $_POST['pname'];
    $prices = $_POST['price'];
    $quantities = $_POST['qty'];
    $discounts = $_POST['discount'];
    $subtotals = $_POST['subtotal'];

    for($index = 0;$index<count($product_names);$index++){

            $products[$index][0] = $product_names[$index];
            $products[$index][1] = $prices[$index];
            $products[$index][2] = $quantities[$index];
            $products[$index][3] = $discounts[$index];
            $products[$index][4] = $subtotals[$index];
    }

    $orderController = new OrderController();
    $result = $orderController->addOrder($cid,$sid,$ordered_date,$required_date,$products);
    if($result){

        header('location:order_index.php?msg=success');

    }
    else{
        header('location:order_index.php?msg=fail');

    }
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
                            Orders Form

                        </div>
                        <div class="row">
                            <?php
                            if(isset($_GET['msg'])){
                                if($_GET['msg'] == 'success'){
                                   echo "<span class=' alert alert-success' >Order is added Successfully</span>";
                                }elseif($_GET['msg'] == 'updatesuccess'){
                                    echo "<span class=' alert alert-success' >Successfully updated</span>";

                                }elseif($_GET['msg'] == 'updatefail'){
                                    echo "<span class=' alert alert-danger' >Error in Updating orders</span>";

                                }elseif($_GET['msg'] == 'deleted'){
                                    echo "<span class=' alert alert-success' >Successfully deleted</span>";

                                }elseif($_GET['msg'] == 'faildelete'){
                                    echo "<span class=' alert alert-danger' >Error in deleting orders</span>";

                                }
                                else{
                                   echo "<span class=' alert alert-danger' >Error in orders</span>";
                                }
                            }
                             ?>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post" >
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span>Customer Name : </span>
                                            <select name="cname" id="" class=" form-select" >
                                                <?php foreach($customers as $customer): ?>
                                                    <option value="<?= $customer['customer_id'] ?>"><?=$customer['first_name']." ".$customer['last_name']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <span>Store Name : </span>
                                            <select name="sname" id="store" class=" form-select" >
                                                <?php foreach($stores as $store): ?>
                                                    <option value="<?= $store['store_id'] ?>"><?=$store['store_name']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <span>Staff Name : </span>
                                            <select name="sfname" id="staff" class=" form-select" >
                                                <?php foreach($staffs as $staff): ?>
                                                    <option value="<?= $staff['staff_id'] ?>"><?=$staff['first_name']." ".$staff['last_name']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="" class=" form-label" >Order Date</label>
                                            <input type="date" name="order_date" class=" form-control">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="" class=" form-label" >Required Date</label>
                                            <input type="date" name="required_date" class=" form-control">
                                        </div>



                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-2">
                                            <button class=" btn btn-primary btn-sm btnAdd" >Add More Products row</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <table class=" table">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Unit Price</th>
                                                        <th>Qty</th>
                                                        <th>Discount</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody">
                                                    <tr>
                                                        <td>
                                                            <select name="pname[]" class=" form-select product" id="">
                                                                <option value="">Choose Product</option>
                                                            <?php
                                                            foreach($stocks as $stock){
                                                                echo "<option value=".$stock['product_id'].">".$stock['pname']."</option>";
                                                            }
                                                            ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="price[]" class=" form-control price" value="0" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="qty[]" class=" form-control qty" value="0" >
                                                        </td>
                                                        <td>
                                                            <input type="number" name="discount[]" class=" form-control discount" value="0" >
                                                        </td>
                                                        <td>
                                                            <input type="number" name="subtotal[]" class=" form-control subtotal" value="0" readonly>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <button class=" btn btn-success" name="submit" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </main>
                <script src="../scripts/jquery-3.7.1.min.js"></script>
                <script>

                      $('.btnAdd').click(function (event) {
                        event.preventDefault()
                        let sname=$('#store').val()
                        console.log(sname);
                        $.ajax({
                          url:'get-stock.php',
                          method : 'post',
                          data : {id:sname},
                          success:function(response){

                              $('#tbody').append(response)

                          }
                        });
                        // let output;
                        // output+= '<tr><td><select name="pname" class=" form-select"></select></td>'+
                        // '<td><input type="number" name="price" class=" form-control"></td>'+
                        // '<td><input type="number" name="qty" class=" form-control"></td>'+
                        // '<td><input type="number" name="discount" class=" form-control"></td>'+
                        // '<td><input type="number" name="subtotal" class=" form-control"></td>'+
                        // '<td><button class=" btn btn-danger btn-sm btnRemove">remove</button></td>'+
                        // '</tr>';
                        })

                        $(document).on('click','.btnRemove',function(event){
                            event.preventDefault()
                            let tr=$(this).parent().parent()
                            $(tr).remove()
                        })

                        $(document).on('change','.product',function(){
                            let pid = $(this).val()
                            let td=$(this).parent()
                            let price = td.next().children()
                            let qty = price.parent().next().children()
                            let discount = qty.parent().next().children()
                            let subtotal =discount.parent().next().children()

                            $.ajax({
                                type: "method",
                                url: "get-product.php",
                                method: "post",
                                data: {id:pid},
                                success: function (response) {
                                    price[0].value =response
                                     subtotal.val((price.val() * qty.val())-(qty.val()*discount.val()))

                                }
                            });
                        })

                        $(document).on('keyup','.qty',function(){
                            let td = $(this).parent();
                            let price = td.prev().children()
                            let qty = $(this)
                            let discount = td.next().children()
                            let subtotal =discount.parent().next().children()
                            subtotal.val((price.val() * qty.val())-(qty.val()*discount.val()))
                        })

                        $(document).on('keyup','.discount',function(){
                            let td = $(this).parent();
                            let qty = td.prev().children()
                            let discount = $(this)
                            let subtotal = td.next().children()
                            let price =qty.parent().prev().children()
                            subtotal.val((price.val() * qty.val())-(qty.val()*discount.val()))
                        })

                </script>
               <?php
               include("../layouts/footer.php");
?>
