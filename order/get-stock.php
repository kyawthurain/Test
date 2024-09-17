<?php

include_once "../controllers/stock-controller.php";

$stockController = new StockController();
$products = $stockController->getStockByStore($_POST['id']);
$output= "";
$output.="<tr>";
$output.="<td><select name='pname[]' class=' form-select product'><option>Choose Product</option>";
foreach($products as $product){
    $output.="<option value=".$product['product_id'].">".$product['pname']."</option>";
}
$output.="</select></td>";
$output .=  '<td><input type="number" name="price[]" class=" form-control price" value="0" readonly></td>'.
'<td><input type="number" name="qty[]" class=" form-control qty" value="0"></td>'.
'<td><input type="number" name="discount[]" class=" form-control discount" value="0"></td>'.
'<td><input type="number" name="subtotal[]" class=" form-control subtotal" value="0" readonly></td>'.
'<td><button class=" btn btn-danger btn-sm btnRemove">remove</button></td>'.
'</tr>';
echo $output;
