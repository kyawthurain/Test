<?php

include_once "../models/brand.php";
class BrandController{


    function addBrand($name){
        $brand = new Brand();
        $result= $brand->insertBrand($name);
        return $result;
    }

    function getBrands(){
        $brand = new Brand();
        return $brand->getAllBrands();
    }

    function getBrandById($id){
        $brand = new Brand();
        return $brand->getBrandById($id);
    }

    function updateBrand($id,$name){
        $brand = new Brand();
        return $brand->updateBrand($id,$name);
    }

    function deleteBrand($id){
        $brand = new Brand();
        return $brand->deleteBrand($id);
    }

    function softdeleteBrand($id){
        $brand = new Brand();
        return $brand->softdeleteBrand($id);
    }

    function searchBrand($data){
        $brand = new Brand();
        return $brand->search($data);
    }
}
