<?php

include_once "../controllers/brand-controller.php";

$data = $_POST['value'];
$brandController = new BrandController();

$brands = $brandController->searchBrand($data);
$output = "";
$count = 1;
foreach($brands as $brand){
    $output .= "<tr>";
    $output .= "<td>".$count++."</td>";
    $output .= "<td>".$brand['name']."</td>";
    $output .="<td>";
    $output .=   "<a class=' btn btn-info mx-2' href='read-brand.php?id=".$brand['brand_id']."' >Read</a>";
    $output .= "<a class=' btn btn-warning mx-2' href='edit-brand.php?id=".$brand['brand_id']."' >Edit</a>";
    $output .= "<a class=' btn btn-danger mx-2' href='delete-brand.php?id=".$brand['brand_id']."' >Delete</a>";
    $output .=  "<a class=' btn btn-danger mx-2' href='softdelete-brand.php?id=".$brand['brand_id']."' >SoftDelete</a>";
    $output .=  "<a class=' btn btn-danger mx-2 btnDelete' >Ajax delete</a>";
    $output .="</td>";
    $output.= "</tr>";
}

echo $output;
